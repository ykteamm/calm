<?php

namespace App\Models;

use App\Models\BaseTranslation;

class MedicineTranslation extends BaseTranslation
{
    protected $table = 'medicine_translations';

    public $timestamps = false;

    protected $guarded = [];
}
