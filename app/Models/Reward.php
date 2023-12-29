<?php

namespace App\Models;

use App\Traits\HasAsset;

class Reward extends BaseModel
{
    const IMAGE = 10;
    use HasAsset;

    protected $guarded = [];

    public function assetTypes()
    {
        return [
            static::IMAGE => $this->images()
        ];
    }
    public function images()
    {
        return $this->assets()->where('type', static::IMAGE);
    }

    protected $fillable = [
        'user_id',
        'text',
        'feelings',
        'type',
        'done'
    ];
}