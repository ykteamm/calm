<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Category extends BaseModel
{
	use HasTranslation;

	public $translationClass = CategoryTranslation::class;

    protected $fillable = [
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function meditations()
    {
        return $this->hasMany(Meditation::class, 'category_id', 'id');
    }
}