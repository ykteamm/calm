<?php

namespace App\Models;

class Usershow extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'meditation_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function meditation()
    {
        return $this->belongsTo(Meditation::class, 'meditation_id', 'id');
    }
}