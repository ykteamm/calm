<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Package extends BaseModel
{
	use HasTranslation;

	public $translationClass = PackageTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }
}