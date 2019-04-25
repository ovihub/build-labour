<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    protected $table = 'skill_levels';

    protected $fillable = [ 'level', 'skill_id' ];

    const UPDATED_AT = null;
    const CREATED_AT = null;
}