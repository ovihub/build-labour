<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\Models\Companies\Company;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkExperience extends BaseModel
{

    private $userId = null;

    protected $table = 'work_experience';
    protected $primaryKey = 'id';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [ 'job_role', 'company_name' ];


    /**
     * @return array
     */
    private function rules()
    {
        return [
            'job_role'      => 'required',
            'company_name'  => 'required',
            'user_id'       => 'required|integer'
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

    public function Company() {

        return $this->belongsTo( Company::class, 'company_id', 'id');
    }

    public function store(Request $r) {

        $data = $r->all();
        $data['user_id'] = $this->userId;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

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
