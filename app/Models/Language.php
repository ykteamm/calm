<?php

namespace App\Models;

class Language extends BaseModel
{
    protected $fillable = [
        'code',
        'name',
        'is_active'
    ];
}
