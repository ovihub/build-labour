<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;

class Users extends BaseModel{

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [ 'id', 'email' , 'first_name' , 'last_name' , 'password'  ];
    protected $hidden =[ 'password' , 'remember_token','updated_at' , 'created_at' ];
    protected $appends = [  'full_name'  ];

    public $sql;
    public $bindings;

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'email'         => 'required|string|email|max:50|unique:users',
            'password'      => 'required|string|min:6|max:24|confirmed'
        ];
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
        $validator = \Validator::make( $r->all() , $this->rules() );

        if( $validator->fails() ){
            $this->errors = $validator->errors()->all();
            return false;
        }

        $this->fill( $r->all() );
        $pk = $this->primaryKey;

        if( $r->$pk  ){
            $this->exists = true;
        }else{
            // do stuff for new users here
        }

        try{
            $this->save();
        }catch( \Exception $e ){
            $this->errors[] = $e->getMessage();
            return false;
        }


        return $this;
    }
    
    public function setPasswordAttribute( $password )
    {
        if ( ! empty( $password ) ) {
            $this->attributes['password'] = \Hash::make( $password );
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

    public function emailExists( $email )
    {
        $user =  static::where( 'email' , $email )
            ->first();

        return $user;
    }
    
    public function verify( )
    {
        if( ! $this->id ){
            $this->addError( 'User is non-existent' );
            return false;
        }
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}