<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use Illuminate\Http\Request;

class Users extends BaseModel{

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [ 'id', 'email' , 'first_name' , 'last_name' , 'password'  ];
    protected $hidden =[ 'password' , 'remember_token','updated_at' , 'created_at' ];
    protected $appends = [  'full_name'  ];

    public $sql;
    public $bindings;

    public function emailExists( $email )
    {
        $user =  static::where( 'email' , $email )
            ->first();

        return $user;
    }

    /**
     * Common saving method for the model
     *
     * @param Request $r
     * @return $this|bool
     */
    public function store( Request $r )
    {
        $validator = \Validator::make( $r->all() , [
            // validation rules here
        ] );

        if( $validator->fails() ){
            $this->errors = $validator->errors()->all();
            return false;
        }

        $this->fill( $r->all() );
        $pk = $this->primaryKey;

        if( $r->$pk  ){
            $this->exists = true;
        }else{

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


}