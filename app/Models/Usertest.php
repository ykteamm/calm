<?php

namespace App\Models;

class Usertest extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'packages',
        'steroids',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}