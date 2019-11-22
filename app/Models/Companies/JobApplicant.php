<?php

namespace App\Models\Companies;

use App\Models\BaseModel;
use App\User;
use Carbon\Carbon;

class JobApplicant extends BaseModel
{
    protected $table = 'job_post_applicants';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_id',
        'user_id',
        'applied_at'
    ];

    protected $appends = [
        'applied_proper'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function User() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Job() {

        return $this->belongsTo( Job::class, 'job_id', 'id');
    }

    public function getAppliedProperAttribute() {

        return Carbon::parse($this->applied_at)->diffForHumans();
    }
}
