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
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}