<?php

namespace App\Models;

class Usershow extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'meditation_id',
        'lesson_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function meditation()
    {
        return $this->belongsTo(Meditation::class, 'meditation_id', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}