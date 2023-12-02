<?php

namespace App\Models;

class Feeling extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'emoji_id',
        'status',
        'story'
    ];
}