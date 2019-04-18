<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use App\User;
use Illuminate\Http\Request;

class WorkerDetail extends BaseModel
{
    protected $table = 'worker_details';

    protected $fillable = ['profile_description', 'nrole_info', 'nrole_when', 'nrole_travel_to_home', 'nrole_address', 'nrole_state', 'nrole_right_to_work_au', 'user_id'];

    private $userId = null;

    const UPDATED_AT = null;
    const CREATED_AT = null;

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

        try{

            $this->save();

        } catch (\Exception $e){

            $this->errors[] = $e->getMessage();

            return false;
        }

        return $this;
    }
}
