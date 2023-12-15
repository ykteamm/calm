<?php

namespace App\Models;

class Reply extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'gratitude_id',
        'text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function gratitude()
    {
        return $this->belongsTo(Gratitude::class, 'gratitude_id', 'id');
    }

    public function gratitude_id()
    {
        return $this->belongsTo(GratitudeTranslation::class, 'gratitude_id', 'id');
    }
}
