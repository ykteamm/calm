<?php

namespace App\Models;

class Aim extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'text',
        'done',
        'type'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
