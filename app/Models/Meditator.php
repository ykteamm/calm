<?php

namespace App\Models;

use App\Traits\HasAsset;

class Meditator extends BaseModel
{
    const AVATAR = 10;
    const IMAGE = 20;
    const AUDIO = 30;
    const VIDEOS = 40;

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

    function audio()
    {
        return $this->asset()->where('type', static::AUDIO);
    }

    function videos()
    {
        return $this->assets()->where('type', static::VIDEOS);
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