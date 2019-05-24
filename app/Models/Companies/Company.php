<?php

namespace App\Models\Companies;

use App\Helpers\Utils;
use App\Models\BaseModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class Company extends BaseModel
{

    private $userId = null;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'contact_email',
        'contact_name',
        'phone',
        'locations_json',
        'sector',
        'tier',
        'photo_url',
        'introduction',
        'website',
        'created_by'
    ];

    protected $appends = [ 'locations', 'no_of_workers' ];

    protected $hidden = [ 'locations_json' ];
    /**
     * @return array
     */
    private function rules()
    {
        return [
            'name'          => 'required|min:5',
            'address'       => 'nullable|min:5',
         //   'contact_email' => 'nullable|min:5',
         //   'contact_name'  => 'nullable|min:5',
            'phone'         => 'nullable|min:5',
            'sector'        => 'nullable|min:4',
            'tier'          => 'nullable|min:4',
            'introduction'  => 'nullable|min:5',
            'website'       => 'nullable|min:5|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ];
    }

    /**
     * Validate a user request
     *
     * @param $request
     * @return bool
     */

    private function validate( $data ){

        $validator = \Validator::make($data, $this->rules());

        if ( $validator->fails() ) {

            $this->errors = $validator->errors()->all();
            $this->errorsDetail = $validator->errors()->toArray();

            return false;
        }

        return true;
    }

    public function CreatedBy() {

        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Workers() {

        return $this->belongsToMany(User::class, 'work_experience', 'id', 'user_id');
    }

    public function Jobs() {

        return $this->hasMany( Job::class, 'company_id', 'id');
    }

    public function Specialization() {

        return $this->hasMany( CompanySpecialized::class, 'company_id', 'id');
    }

    public function Posts() {

        return $this->hasMany(CompanyPost::class, 'company_id', 'id');
    }

    public function setUserId($userId) {

        $this->userId = $userId;
    }

    public function store(Request $r) {

        $data = $r->all();

        if( ! $this->validate( $data )) {

            return false;
        }

        $this->fill( $data );

        $pk = $this->primaryKey;

        if ($r->$pk) {

            $this->exists = true;
        }

        try{

            $this->save();

        } catch (\Exception $e){

            $this->errors[] = $e->getMessage();

            return false;
        }

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

            $this->photo_url = $url;

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

        return '/images/companies/'.$y.'/'.$m.'/'.Utils::convertInt( $this->id ).'/';
    }

    public function getLocationsAttribute() {

        if (Utils::isJson($this->locations_json)) {

            return json_decode($this->locations_json);
        }

        return [];
    }

    public function getNoOfWorkersAttribute() {

        return $this->Workers->count();
    }
}
