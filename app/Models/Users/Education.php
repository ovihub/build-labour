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

    protected $fillable = [ 'course', 'school', 'description', 'start_date', 'end_date', 'user_id' ];

    protected $appends = [  'start_date_formatted', 'end_date_formatted'  ];

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
            'start_date'    => 'required|date',
            'end_date'      => 'required|date',
            'user_id'       => 'required|integer'
        ];
    }

    public function getStartDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->format('F Y');
    }

    public function getEndDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->end_date)->format('F Y');
    }

    public function setStartDateAttribute($date) {

        if (!empty($date)) {

            $this->attributes['start_date'] = Carbon::parse($date);
        }
    }

    public function setEndDateAttribute($date) {

        if (!empty($date)) {

            $this->attributes['end_date'] = Carbon::parse($date);
        }
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
