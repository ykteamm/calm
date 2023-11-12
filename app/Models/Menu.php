<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Menu extends BaseModel
{
	use HasTranslation;

	public $translationClass = MenuTranslation::class;

    protected $guarded = [];

    protected $fillable = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}