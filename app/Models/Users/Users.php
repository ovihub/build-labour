<?php

namespace App\Models\Users;

use App\Mails\ResendVerificationCodeEmail;
use App\Models\BaseModel;
use App\Models\Companies\Company;
use App\User;
use App\Helpers\Utils;
use Illuminate\Http\Request;
use JWTAuth;
use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Users extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [ 'id', 'email' , 'first_name' , 'last_name', 'password',
        'date_of_birth' , 'country', 'address', 'mobile_number', 'role_id', 'gender', 'marital_status' ];

    protected $hidden =[ 'password' , 'remember_token','updated_at' , 'created_at', 'verification_code' ];

    protected $appends = [ 'full_name', 'dob_formatted' ];

    public $sql;
    public $bindings;

    public $isWeb = true;

    /* Optional information to be updated */
    public $isOptionalTransaction = false;

    /**
     * @return array
     */
    private function rules()
    {

        if ($this->isOptionalTransaction) {

            return [];
        }


        if( $this->id ) {

            // validation rules for updated users
            return [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits_between:9,10'
            ];
        }


        return [
            'email'         => 'required|string|email|max:50|unique:users',
            'password'      => 'required|string|min:6|max:24|confirmed',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits_between:9,10'
        ];
    }

    /**
     * Validate a user request
     *
     * @param $request
     * @return bool
     */

    private function validate( $request ){

        if( $this->id ){

            $validator = \Validator::make( $request->all() , $this->rules() );

            // email must not be modified
            if( $request->email && $request->email != $this->email ){

                $validator->errors()->add( 'email', 'Not allowed to modify Email or Username' );

                $this->errors = $validator->errors()->all();
                $this->errorsDetail = $validator->errors()->toArray();
                return false;

            }

            if( $validator->fails() ){
                $this->errors = $validator->errors()->all();
                $this->errorsDetail = $validator->errors()->toArray();
                return false;
            }


        } else {

            $validator = \Validator::make( $request->all() , $this->rules() );

            if( $validator->fails() ){
                $this->errors = $validator->errors()->all();
                $this->errorsDetail = $validator->errors()->toArray();
                return false;
            }
        }

        return true;
    }

    /**
     * Common saving method for the model
     *
     * @param Request $r
     * @return $this|bool
     *
     */

    public function store( Request $r )
    {


        if( ! $this->validate( $r )){
            return false;
        }

        $this->fill( $r->all() );
        $pk = $this->primaryKey;

        if( $r->$pk  ){

            $this->exists = true;

        } else {

            // do stuff for new users here
            $this->is_verified          =   null;
            $this->verification_code    =   $this->generateVerificationCode();

        }

        try {

            if (!$this->exists) {

                \Mail::to( $this->email )->send( new ResendVerificationCodeEmail( $this ) );
            }

            // deal with roles
            if ($this->exists) {

                $user = JWTAuth::toUser();

                // create worker detail record if the user type is WORKER

                if ($user) {

                    if ($this->role_id == self::USER_TYPE_WORKER && !$user->WorkerDetail) {

                        WorkerDetail::create(['user_id' => $this->id]);

                    } else if ($this->role_id == self::USER_TYPE_COMPANY && !$user->Company) {

                        Company::create(['created_by' => $this->id]);
                    }
                }

            }

            $this->save();

        } catch( \Exception $e ){

            $this->errors[] = $e->getMessage();

            return false;
        }

        return $this;
    }

    public function setFirstNameAttribute( $name )
    {
        if ( ! empty( $name ) ) {

            $this->attributes['first_name'] = $name;
        }
    }

    public function setLastNameAttribute( $name )
    {
        if ( ! empty( $name ) ) {

            $this->attributes['last_name'] = $name;
        }
    }


    public function setPasswordAttribute( $password )
    {
        if ( ! empty( $password ) ) {

            $this->attributes['password'] = \Hash::make( $password );
        }
    }

    public function setMobileNumberAttribute($mobile) {

        if ( ! empty( $mobile ) ) {

            $mobile = str_replace('+61', '', trim($mobile));

            $this->attributes['mobile_number'] = '+61' . $mobile;
        }
    }

    public function getJwtToken()
    {
        // the JWTSubject class is App/User and not $this
        $jwt_subject = ( new User )->find( $this->id );

        if( ! $jwt_subject ){
            return false;
        }

        return JWTAuth::fromUser( $jwt_subject );
    }

    /**
     * @param $email
     * @return mixed
     */
    public function emailExists( $email )
    {
        $user =  static::where( 'email' , $email )
            ->first();

        return $user;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getDobFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->date_of_birth)->format('d F Y');
    }

    public function resendVerificationCode()
    {
        $this->verification_code = $this->generateVerificationCode();

        try{
            $this->save();
            \Mail::to( $this->email )->send( new ResendVerificationCodeEmail( $this ) );
        }catch( \Exception  $e ){
            $this->addError( $e->getMessage() );
            return false;
        }

        return $this;
    }

    public function verify( $verification_code )
    {
        if( ! $this->id ){

            $message = 'Unknown user id';
            $this->addError( $message );
            $this->errorsDetail = array('verification' => [$message]);
            return false;
        }

        if( ! $verification_code ){

            $message = 'Verification code must not be empty';
            $this->addError( $message );
            $this->errorsDetail = array('verification' => [$message]);
            return false;
        }

        if( $this->is_verified ){

            $message = 'User was already verified';
            $this->addError( $message );
            $this->errorsDetail = array('verification' => [$message]);
            return false;
        }

        if( $verification_code != $this->verification_code ){

            $message = 'Incorrect verification code';
            $this->addError( $message );
            $this->errorsDetail = array('verification' => [$message]);
            return false;
        }

        $this->verification_code = null;
        $this->is_verified = date( 'Y-m-d H:i:s');
        $this->save();

        return $this;
    }

    /**
     * @param Request $r
     * @return $this|bool
     */
    public function uploadProfilePhoto( Request $request )
    {

        try {

            if( ! $this->id ){
                $this->addError(  'Unknown user' ) ;
                return false;
            }

            $validator = \Validator::make( $request->all(), [ 'photo' => 'required|image64:jpeg,jpg,png' ] );

            if( $validator->fails() ){
                $this->addError(  $validator->errors()->first() ) ;
                return false;
            }

            $photo = $request->get('photo');

            // $ext = $request->photo->getClientOriginalExtension();
            $ext = '.png';

            // rename photo files if you like
            $new_filename   = 'p_'.str_random( 12 ).'.'.$ext;
            $destination    = $this->generateUserImagePath( $request );
            $url = url( '/storage'.$destination.$new_filename );

            // Defaults to a storage path but you may save it to a public for non sensitive files
            // Do not forget to call php artisan storage:link
            $dir_path  = storage_path() . '/app/public'.$destination;

            if( ! is_dir( $dir_path )){
                mkdir( $dir_path , 755 , true );
            }

            $file_path = $dir_path.$new_filename;

            // default compression to 320x320
            // you need to improve this to handle images that has large difference in aspect ratio

            Image::make(  file_get_contents($photo) )
                ->resize( 320, 320 )
                ->save( $file_path );

            // file path can be handy on some cases
            // $file_path  = $dir_path.$new_filename;

            // you may generate thumbnails if needed
            // Utils::generateThumbnail( $file_path, [] );

            $this->profile_photo_url = $url;

            $this->save();


        } catch (\Exception $e) {

            $this->addError(  $e->getMessage() ) ;
            $this->errorsDetail = ['image' => ['Something wrong while processing the image']];
            return false;
        }

        return $this;
    }

    /**
     * User image path is designed so that it would be easy to have a daily backup
     * without downloading everything
     *
     * @return string
     *
     */
    private function generateUserImagePath( )
    {
        $date = $this->created_at;
        $m  =  date( 'md' , strtotime( $date ));
        $y  =  date( 'Y' , strtotime( $date ));

        return '/images/'.$y.'/'.$m.'/'.Utils::convertInt( $this->id ).'/';
    }

    private function generateVerificationCode()
    {

        if ($this->isWeb) {

            $code = strtoupper( str_random( 50 ) );

        } else {

            $code = strtoupper( str_random( 6 ) );

        }

        $has_code = static::where( 'verification_code' , $code )->count();

        if( $has_code ){

            return $this->generateVerificationCode();
        }

        return $code;
    }

}