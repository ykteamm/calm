<?php

namespace App\Traits;

use App\Models\Asset;
use App\Models\AssetTranslation;

trait HasAsset
{
    public bool $assetable = true;

    public $assetModel = Asset::class;
    
    public $assetTranslationModel = AssetTranslation::class;

    public function assetTypes()
    {
        return [];
    }

    public function assetSettings()
    {
        return [];
    }

    public function assets()
    {
        return $this->morphMany(Asset::class, 'assetable');
    }

    public function asset()
    {
        return $this->morphOne(Asset::class, 'assetable');
    }
}
