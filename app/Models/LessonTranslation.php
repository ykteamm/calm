<?php

namespace App\Models;

use App\Models\BaseTranslation;

class LessonTranslation extends BaseTranslation
{
    protected $table = 'lesson_translations';

    public $timestamps = false;

    protected $guarded = [];
}
