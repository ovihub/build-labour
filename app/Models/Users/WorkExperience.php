<?php

namespace App\Models\Users;

use App\Helpers\Utils;
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

    protected $fillable = [
        'job_role', 'company_name', 'location', 'project_size', 'user_id', 'company_id',
        'start_month', 'start_year', 'end_month', 'end_year', 'isCurrent'
    ];

    protected $appends = ['responsibilities'];

    protected $hidden = ['ResponsibilitiesDetail'];
    /**
     * @return array
     */
    private function rules()
    {
        return [
            'job_role'      => 'required',
            'company_name'  => 'required',
            'project_size'  => 'required|regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/', /* monetary validation */
            'location'      => 'required|string',
            'start_month'   => 'required|integer',
            'start_year'    => 'required|integer',
            'end_month'     => 'nullable|integer',
            'end_year'      => 'nullable|integer',
            'user_id'       => 'required|integer',
            'company_id'    => 'nullable|integer'
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

    public function setUserId($userId) {

        $this->userId = $userId;
    }

    public function User() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Company() {

        return $this->belongsTo( Company::class, 'company_id', 'id');
    }

    public function ResponsibilitiesDetail() {

        return $this->hasMany(WorkExperienceResponsibility::class, 'work_experience_id', 'id');
    }

    public function getResponsibilitiesAttribute() {

        $responsibilities = [];

        foreach ($this->responsibilitiesDetail as $r) {

            $responsibilities[] = $r->responsibility;
        }

        return $responsibilities;
    }

    public function setProjectSizeAttribute($value) {

        if ( ! empty( $value ) ) {

            $format = preg_replace("/[^0-9.]/","",$value);
            $format = number_format($format,0);
            $this->attributes['project_size'] = $format;
        }
    }

    public function setIsCurrentAttribute($value) {

        if ( !empty($value) ) {

            $this->attributes['isCurrent'] = $value;

        } else {

            $this->attributes['isCurrent'] = 0;
        }
    }

    public function store(Request $r) {

        $data = $r->all();
        
        $pk = $this->primaryKey;

        if ($r->$pk) {

            $this->exists = true;
            $data['updated_at'] = Carbon::now();

        } else {

            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
        }

        $data['user_id'] = $this->userId;

        if (isset($data['isCurrent']) && $data['isCurrent']) {

            $data['end_month'] = null;
            $data['end_year'] = null;
        }

        if (!$this->validate($data)) {

            return false;
        }


        $this->fill( $data );

        try {

            $this->save();

        } catch (\Exception $e){

            $this->errors[] = $e->getMessage();

            return false;
        }

        return $this;
    }
}
