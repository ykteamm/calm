<?php

namespace App\Models;
use App\Traits\HasAsset;
use App\Traits\HasTranslation;

class Lesson extends BaseModel
{
    const AUDIO = 10;
    const IMAGE = 20;

	use HasTranslation, HasAsset;

	public $translationClass = LessonTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'meditation_id',
        'block',
        'daily',
        'duration'
    ];

    public function meditation()
    {
        return $this->belongsTo(Meditation::class, 'meditation_id', 'id');
    }

    public function assetTypes()
    {
        return [
            static::IMAGE => $this->image(),
            static::AUDIO => $this->audio()
        ];
    }

    public function audio()
    {
        return $this->asset()->where('type', static::AUDIO);
    }

    public function image()
    {
        return $this->asset()->where('type', static::IMAGE);
    }

    public function usershows()
    {
        return $this->hasMany(Usershow::class, 'lesson_id', 'id');
    }
}