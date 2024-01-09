<?php

namespace App\Models;

use App\Traits\HasTranslation;
use Database\Factories\MeditationFactory;

class Meditation extends BaseModel
{
	use HasTranslation;

	protected static string $model_factory = MeditationFactory::class;
	public $translationClass = MeditationTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'meditator_id',
        'category_id',
        'views',
        'type',
        'group'
    ];

    public function meditator()
    {
        return $this->belongsTo(Meditator::class, 'meditator_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'meditation_id', 'id');
    }

    public function usershows()
    {
        return $this->hasMany(Usershow::class, 'meditation_id', 'id');
    }
}