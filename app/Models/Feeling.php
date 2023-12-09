<?php

namespace App\Models;

class Feeling extends BaseModel
{
    protected $guarded = [];

    protected $table = 'feelings';

    protected $fillable = [
        'id',
        'user_id',
        'emoji_id',
        'status',
        'story'
    ];
}
