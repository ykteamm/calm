<?php

namespace App\Models;

use App\Models\BaseTranslation;

class VariantTranslation extends BaseTranslation
{
    protected $table = 'variant_translations';

    public $timestamps = false;

    protected $guarded = [];
}
