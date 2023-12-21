<?php

namespace App\Models;

use App\Models\BaseTranslation;

class PackageTranslation extends BaseTranslation
{
    protected $table = 'package_translations';

    public $timestamps = false;

    protected $guarded = [];
}
