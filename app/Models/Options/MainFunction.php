<?php

namespace App\Models\Options;

use Illuminate\Database\Eloquent\Model;

class MainFunction extends Model
{
    protected $table = 'company_main_functions';

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    public function items()
    {
        return $this->hasMany(SecondaryFunction::class, 'main_id', 'id');
    }
}
