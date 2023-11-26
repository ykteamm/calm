<?php

namespace App\Models;

use App\Models\BaseTranslation;

class MotivationTranslation extends BaseTranslation
{
    protected $table = 'motivation_translations';

    public $timestamps = false;

    protected $guarded = [];
}
