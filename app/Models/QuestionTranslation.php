<?php

namespace App\Models;

use App\Models\BaseTranslation;

class QuestionTranslation extends BaseTranslation
{
    protected $table = 'question_translations';

    public $timestamps = false;

    protected $guarded = [];
}
