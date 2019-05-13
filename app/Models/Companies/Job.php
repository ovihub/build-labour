<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'exp_level',
        'type',
        'salary',
        'company_id',
        'created_by',
        'isAvailable'
    ];

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'title'         => 'required|min:5',
            'description'   => 'nullable|min:5',
            'exp_level'     => 'nullable|min:5',
            'type'          => 'nullable|min:5',
            'salary'        => 'nullable|min:5',
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

    public function Company() {

        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function CreatedBy() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function store(Request $r) {

        $data = $r->all();

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
