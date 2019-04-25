<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\Models\Skills\Skill;
use App\Models\Skills\SkillLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserSkill extends BaseModel
{

    private $userId = null;

    protected $table = 'user_skills';
    protected $primaryKey = 'id';

    protected $fillable = [ 'user_id', 'skill_id', 'skill_level_id' ];
    protected $appends = [ 'skill_name', 'skill_level_name' ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'skill_id' => 'required|integer',
            'skill_level_id' => 'required|integer',
            'user_id' => 'required|integer'
        ];
    }

    public function Skill() {

        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public function SkillLevel() {

        return $this->belongsTo(SkillLevel::class, 'skill_level_id', 'id');
    }

    public function getSkillNameAttribute() {

        if ($this->skill) {

            return $this->skill->skill;
        }

        return '';
    }

    public function getSkillLevelNameAttribute() {

        if ($this->skillLevel->level) {

            return $this->skillLevel->level;
        }

        return '';
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
