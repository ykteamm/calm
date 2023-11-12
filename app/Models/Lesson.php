<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Lesson extends BaseModel
{
	use HasTranslation;

	public $translationClass = LessonTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'meditation_id'
    ];

    public function audios()
    {
        return $this->morphMany(Audio::class, 'audioable');
    }
}