<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Question extends BaseModel
{
	use HasTranslation;

	public $translationClass = QuestionTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'issue_id',
        'type'
    ];
}