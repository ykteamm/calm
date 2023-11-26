<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Gratitude extends BaseModel
{
	use HasTranslation;

	public $translationClass = GratitudeTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];
}