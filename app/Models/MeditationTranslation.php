<?php

namespace App\Models;

use App\Models\BaseTranslation;

class MeditationTranslation extends BaseTranslation
{
    protected $table = 'meditation_translations';

    public $timestamps = false;

    protected $guarded = [];
}
