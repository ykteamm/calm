<?php

namespace App\Models;

use App\Models\BaseTranslation;

class MenuTranslation extends BaseTranslation
{
    protected $table = 'menu_translations';

    public $timestamps = false;

    protected $guarded = [];
}
