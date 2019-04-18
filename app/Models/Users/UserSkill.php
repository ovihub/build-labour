<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserSkill extends BaseModel
{

    private $userId = null;

    protected $table = 'user_skills';
    protected $primaryKey = 'id';

    protected $fillable = [ 'skill', 'description', 'user_id' ];


    /**
     * @return array
     */
    private function rules()
    {
        return [
            'skill'          => 'required',
            'description'   => 'required',
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
