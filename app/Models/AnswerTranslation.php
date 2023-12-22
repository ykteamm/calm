<?php

namespace App\Models;

use App\Models\BaseTranslation;

class AnswerTranslation extends BaseTranslation
{
    protected $table = 'answer_translations';

    public $timestamps = false;

    protected $guarded = [];
}
