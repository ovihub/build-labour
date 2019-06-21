<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\Models\Options\BusinessType;
use App\Models\Options\Tier;
use App\User;
use Illuminate\Http\Request;

class WorkerDetail extends BaseModel
{
    protected $table = 'worker_details';

    protected $fillable = [
        'profile_description',
        'english_skill',
        'drivers_license',
        'right_to_work',
        'main_skill',
        'introduction',
        'when',
        'max_distance',
        'address',
        'state',
        'nrole_right_to_work_au',
        'user_id',
        'has_registered_vehicle',
        'education_id',
        'suburb',
        'most_recent_role'
    ];

    private $userId = null;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public $isMainSkillUpdate = false;
    public $isIntroductionUpdate = false;

    /**
     * @return array
     */
    private function rules()
    {

        if ($this->isMainSkillUpdate) {

            return [
                'main_skill' => 'required|min:5'
            ];
        }

        if ($this->isIntroductionUpdate) {

            return [
                'education_id' => 'nullable|integer'
            ];
        }

        return [
            'english_skill' => 'nullable|boolean',
            'drivers_license' => 'nullable|boolean',
            'right_to_work' => 'nullable|boolean',
            'has_registered_vehicle' => 'nullable|boolean',
            'introduction'  => 'nullable|min:5',
            'profile_description' => 'nullable|min:10',
            'when' => 'nullable|integer',
            'max_distance' => 'nullable|integer'
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

    public function Education() {

        return $this->belongsTo(Education::class, 'education_id', 'id');
    }

    /**
     * Return a collection relates to Sectors
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Areas() {

        return $this->belongsToMany(BusinessType::class, 'worker_areas', 'worker_id', 'business_type_id');
    }

    /**
     * Return a collection relates to Sectors
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Sectors() {

        return $this->belongsToMany(BusinessType::class, 'worker_areas', 'worker_id', 'business_type_id');
    }

    /**
     * Return a collection relates to Tiers
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Tiers() {

        return $this->belongsToMany(Tier::class, 'worker_tiers', 'worker_id', 'tier_id');
    }

    public function setUserId($userId) {

        $this->userId = $userId;
    }

    public function getLatestExperience() {

        $exp = $this->user->experiences->where('isCurrent', true)->first();

        if (!$exp) {

            $expId = $this->user->experiences->max('id');

            $exp = WorkExperience::find($expId);
        }

        return $exp;
    }

    public function store(Request $r) {

        $data = $r->all();

        $this->fill( $data );

        $pk = $this->primaryKey;

        if ($r->$pk) {

            $this->exists = true;
            $this->userId = $this->user_id;
        }

        if (!$this->validate($data)) {

            return false;
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