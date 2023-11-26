<?php

namespace App\Models;
use App\Traits\HasAsset;
use App\Traits\HasTranslation;

class Lesson extends BaseModel
{
	use HasTranslation, HasAsset;

	public $translationClass = LessonTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'meditation_id'
    ];

    public function meditation()
    {
        return $this->belongsTo(Meditation::class, 'meditation_id', 'id');
    }

    public function audio()
    {
        return $this->asset();
    }
}