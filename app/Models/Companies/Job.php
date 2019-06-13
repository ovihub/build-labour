<?php

namespace App\Models\Companies;

use App\Models\BaseModel;
use App\User;

class Job extends BaseModel
{
    protected $table = 'job_posts';

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
        'job_role_id',
        'company_id',
        'created_by',
        'is_template'
    ];

    protected $hidden = [
     //   'reports_to_json'
    ];

    protected $appends = [
        'reports_to',
        'reports_to_str',
        'job_role_name'
    ];

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'title'         => 'required|min:5',
            'description'   => 'required|min:5',
            'exp_level'     => 'required|min:5',
            'contract_type' => 'required|min:5',
            'salary'        => 'nullable|regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/', /* monetary validation */
            'location'      => 'required|min:5'
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

    public function JobRole() {

        return $this->belongsTo(JobRole::class, 'job_role_id', 'id');
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

    public function getReportsToStrAttribute() {
        
        $result = preg_replace("/[[\\]\"]/", " ", $this->reports_to_json);
        
        return str_replace(" ,", ", ", $result);
    }

    public function getJobRoleNameAttribute() {

        if ($this->JobRole) {

            return $this->JobRole->job_role_name;
        }

        return $this->title;
        
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

        if (isset($data['reports_to'])) {

            if (!empty($data['reports_to']) && is_array($data['reports_to'])) {

                $this->reports_to_json = json_encode($data['reports_to']);

            } else {

                $this->reports_to_json = NULL;
            }
        }

        if (isset($data['job_role_id'])) {

            $this->title = null;
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
