<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [ 'skill' ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function Levels() {

        return $this->hasMany(SkillLevel::class, 'skill_id', 'id');
    }
}