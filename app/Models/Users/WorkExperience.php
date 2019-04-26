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

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'job_role'      => 'required',
            'company_name'  => 'required',
            'project_size'  => 'required|regex:/^\d+(\.\d{1,2})?$/', /* monetary validation */
            'location'      => 'required|string',
            'start_month'   => 'required|integer',
            'start_year'    => 'required|integer',
            'end_month'     => 'required|integer',
            'end_year'      => 'required|integer',
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

    public function Responsibilities() {

        return $this->hasMany(WorkExperienceResponsibility::class, 'work_experience_id', 'id');
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

        if (!$this->validate($data)) {

            return false;
        }

        if (isset($data['isCurrent']) && $data['isCurrent']) {

            $this->isCurrent = true;
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
