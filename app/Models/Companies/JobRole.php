<?php

namespace App\Models\Companies;

use App\Models\BaseModel;

class JobRole extends BaseModel
{
    protected $table = 'job_roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_role_name',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function store($data) {

        $this->fill( $data );

        $pk = $this->primaryKey;

        if (isset($data[$pk])) {

            $this->exists = true;
        }

        try {

            $this->save();

        } catch (\Exception $e){

            $this->errors[] = $e->getMessage();

            return false;
        }

        return $this;
    }

}
