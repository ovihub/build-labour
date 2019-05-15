<?php

namespace App\Models\Companies;

use App\Models\BaseModel;

class CompanyPost extends BaseModel
{
    protected $table = 'company_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
        'company_id',
        'posted_by'
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
