<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\User;
use Illuminate\Http\Request;

class WorkerDetail extends BaseModel
{
    protected $table = 'worker_details';

    protected $fillable = ['profile_description', 'english_skill', 'drivers_license', 'right_to_work', 'main_skill', 'introduction', 'when', 'max_distance', 'address', 'state', 'nrole_right_to_work_au', 'user_id'];

    private $userId = null;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public $isMainSkillUpdate = false;

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

        return [
            'introduction'  => 'nullable|min:5',
            'english_skill' => 'nullable|min:3',
            'profile_description' => 'nullable|min:10',
            'drivers_license' => 'nullable',
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

    public function setUserId($userId) {

        $this->userId = $userId;
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
