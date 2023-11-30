<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Issue extends BaseModel
{
	use HasTranslation;

	public $translationClass = IssueTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];
}