<?php

namespace App\Models\Companies;

use App\Models\BaseModel;

class JobApplicant extends BaseModel
{
    protected $table = 'job_post_applicants';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_id',
        'user_id',
        'applied_at'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

}
