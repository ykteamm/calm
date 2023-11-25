<?php

namespace App\Models;

use App\Models\BaseTranslation;

class AssetTranslation extends BaseTranslation
{
    protected $table = 'asset_translations';

    public $timestamps = false;

    protected $guarded = [];
}
