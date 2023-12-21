<?php

namespace App\Models;

use App\Models\BaseTranslation;

class TestTranslation extends BaseTranslation
{
    protected $table = 'test_translations';

    public $timestamps = false;

    protected $guarded = [];
}
