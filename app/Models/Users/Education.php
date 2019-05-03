<?php

namespace App\Models\Users;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Education extends BaseModel
{

    private $userId = null;

    protected $table = 'educations';
    protected $primaryKey = 'id';

    protected $fillable = [ 'course', 'school', 'description', 'start_month', 'start_year', 'end_month', 'end_year', 'user_id' ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'course'        => 'required|min:5',
            'school'        => 'required|min:5',
            'start_month'   => 'required|integer',
            'start_year'    => 'required|integer',
            'end_month'     => 'required|integer',
            'end_year'      => 'required|integer',
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


        if (isset($data['end_year']) && isset($data['end_month'])) {

            $start = date("Y-m",strtotime($data['start_year'] . "-" . $data['start_month']));
            $end = date("Y-m",strtotime($data['end_year'] . "-" . $data['end_month']));

            if ($start > $end) { // invalid employment

                $validator->errors()->add( 'end_year', 'Start date should be earlier than end date' );

                $this->errors = $validator->errors()->all();
                $this->errorsDetail = $validator->errors()->toArray();

                return false;
            }
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
        $data['user_id'] = $this->userId;

        if( ! $this->validate( $data )) {

            return false;
        }

        $this->fill( $data );

        $pk = $this->primaryKey;

        if ($r->$pk) {

            $this->exists = true;
            $data['updated_at'] = Carbon::now();

        } else {

            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
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
