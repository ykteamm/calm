<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Category extends BaseModel
{
	use HasTranslation;

	public $translationClass = CategoryTranslation::class;

    protected $fillable = [
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}