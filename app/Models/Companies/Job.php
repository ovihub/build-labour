<?php

namespace App\Models\Companies;

use App\Models\BaseModel;
use App\User;

class Job extends BaseModel
{
    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'about',
        'exp_level',
        'contract_type',
        'salary',
        'reports_to',
        'location',
        'company_id',
        'created_by',
    ];

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'title'         => 'required|min:5',
            'description'   => 'nullable|min:5',
            'exp_level'     => 'nullable|min:5',
            'contract_type' => 'nullable|min:5',
            'salary'        => 'nullable|min:2',
            'reports_to'    => 'nullable|min:5',
            'location'      => 'nullable|min:5'
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

    public function Company() {

        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function CreatedBy() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Requirements() {

        return $this->hasMany( JobRequirement::class, 'job_id', 'id');
    }

    public function Responsibilities() {

        return $this->hasMany( JobResponsibility::class, 'job_id', 'id');
    }

    public function store($data) {


        if( ! $this->validate( $data )) {

            return false;
        }

        $this->fill( $data );

        $pk = $this->primaryKey;

        if (isset($data[$pk])) {

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
