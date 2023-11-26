<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Motivation extends BaseModel
{
	use HasTranslation;

	public $translationClass = MotivationTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'status'
    ];
}