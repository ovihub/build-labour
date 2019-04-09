<?php

namespace App\Models\Companies;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Company extends BaseModel
{

    private $userId = null;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [ 'name', 'address', 'contact_email', 'contact_name', 'phone', 'created_by' ];

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'name'          => 'required',
            'address'       => 'required',
            'contact_email' => 'required',
            'contact_name'  => 'required',
            'phone'         => 'required',
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

    public function User() {

        return $this->belongsTo(User::class, 'user_id', 'id');
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
}
