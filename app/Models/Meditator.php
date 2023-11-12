<?php

namespace App\Models;

class Meditator extends BaseModel
{
    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public function meditations()
    {
        return $this->hasMany(Meditation::class, 'meditator_id', 'id');
    }

    public function avatar()
    {
        return $this->morphOne(Avatar::class, 'avatarable', 'avatarable_type', 'avatarable_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable', 'imageable_type', 'imageable_id');
    }

    public function lessons()
    {
        
    }
}