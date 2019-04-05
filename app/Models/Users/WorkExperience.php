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

    protected $fillable = ['job_role', 'company_name', 'user_id', 'start_date', 'end_date'];

    protected $appends = ['period', 'responsibilities_detail'];

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'job_role'      => 'required',
            'company_name'  => 'required',
            'start_date'    => 'nullable|date',
            'end_date'      => 'nullable|date',
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

    public function setStartDateAttribute($sd) {

        if (!empty($sd)) {

            $this->attributes['start_date'] = Carbon::parse($sd);
        }
    }

    public function setEndDateAttribute($ed) {

        if (!empty($sd)) {

            $this->attributes['end_date'] = Carbon::parse($ed);
        }
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

    public function getPeriodAttribute() {

        $sDate = null;
        $eDate = null;


        if (!$this->start_date && !$this->end_date) {

            return '';
        }

        if ($this->start_date && !$this->end_date) {

            $sDate = Carbon::parse($this->start_date);
            $eDate = Carbon::now();
        }

        if ($this->start_date && $this->end_date) {

            $sDate = Carbon::parse($this->start_date);
            $eDate = Carbon::parse($this->end_date);
        }

        if ($sDate > $eDate) {

            $sDate = Carbon::parse($this->start_date);
            $eDate = Carbon::now();
        }

        return $sDate->diff($eDate)->format('%y years and %m months');

    }

    public function getResponsibilitiesDetailAttribute() {

        if (Utils::isJson($this->responsibilities)) {

            return json_decode($this->responsibilities);
        }

        return [];
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
