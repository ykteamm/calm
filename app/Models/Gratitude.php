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

    public function replies()
    {
        return $this->hasMany(Reply::class, 'gratitude_id', 'id');
    }
}