<?php

namespace App\Models;

use App\Models\BaseTranslation;

class SteroidTranslation extends BaseTranslation
{
    protected $table = 'steroid_translations';

    public $timestamps = false;

    protected $guarded = [];
}
