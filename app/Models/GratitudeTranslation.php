<?php

namespace App\Models;

use App\Models\BaseTranslation;

class GratitudeTranslation extends BaseTranslation
{
    protected $table = 'gratitude_translations';

    public $timestamps = false;

    protected $guarded = [];
}
