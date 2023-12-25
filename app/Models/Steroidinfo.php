<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Steroidinfo extends BaseModel
{
	use HasTranslation;

	public $translationClass = SteroidinfoTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'steroid_id',
        'min',
        'max'
    ];

    public function steroid()
    {
        return $this->belongsTo(Steroid::class);
    }
}