<?php

namespace App\Models;

use App\Traits\HasAsset;
use App\Traits\HasTranslation;

class Menu extends BaseModel
{
	use HasTranslation, HasAsset;

	public $translationClass = MenuTranslation::class;

    protected $guarded = [];

    protected $fillable = ['slug'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function image()
    {
        return $this->asset();
    }
}