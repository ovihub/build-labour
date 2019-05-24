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
        'reports_to_json',
        'location',
        'company_id',
        'created_by',
    ];

    protected $hidden = [
        'reports_to_json'
    ];

    protected $appends = [
        'reports_to'
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
            'salary'        => 'nullable|regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/', /* monetary validation */
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

    public function CreatedBy() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Requirements() {

        return $this->hasMany( JobRequirement::class, 'job_id', 'id');
    }

    public function setReportsToJsonAttribute($data) {

        if (!empty($data) && is_array($data)) {

            $this->attributes['reports_to_json'] = json_encode($data);

        } else {

            $this->attributes['reports_to_json'] = NULL;
        }
    }

    public function setSalaryAttribute($value) {

        if ( ! empty( $value ) ) {

            $format = preg_replace("/[^0-9.]/","",$value);
            $format = number_format($format,0);
            $this->attributes['salary'] = $format;

        } else {
            $this->attributes['salary'] = null;
        }
    }

    public function getReportsToAttribute() {

        return json_decode($this->reports_to_json);
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
