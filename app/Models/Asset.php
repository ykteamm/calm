<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Asset extends BaseModel
{
    use HasTranslation;

    protected $fillable = [
        'path',
        'info',
        'assetable_type',
        'assetable_id',
        'type'
    ];  
    
    public $translationClass = AssetTranslation::class;

    public function assetable() 
    {
        return $this->morphTo();
    }
}