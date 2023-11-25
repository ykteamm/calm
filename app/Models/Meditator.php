<?php

namespace App\Models;

use App\Traits\HasAsset;

class Meditator extends BaseModel
{
    const AVATAR = 10;
    const IMAGE = 20;

    use HasAsset;

    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public function assetTypes()
    {
        return [
            static::AVATAR => $this->avatar(),
            static::IMAGE => $this->image()
        ];
    }

    function avatar()
    {
        return $this->asset()->where('type', static::AVATAR);
    }

    function image()
    {
        return $this->asset()->where('type', static::IMAGE);
    }

    public function meditations()
    {
        return $this->hasMany(Meditation::class, 'meditator_id', 'id');
    }
}