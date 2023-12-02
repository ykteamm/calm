<?php

namespace App\Models;

use App\Traits\HasAsset;

class Emoji extends BaseModel
{
    use HasAsset;
    protected $guarded = [];

    protected $fillable = [
        'text',
        'icon'
    ];

    public function image()
    {
        return $this->asset();
    }
}