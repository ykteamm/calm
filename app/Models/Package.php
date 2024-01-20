<?php

namespace App\Models;

use App\Traits\HasAsset;
use App\Traits\HasTranslation;

class Package extends BaseModel
{
	use HasTranslation, HasAsset;

	public $translationClass = PackageTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'priority',
        'extra'
    ];

    public function image()
    {
        return $this->asset();
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }

    public function tests()
    {
        return $this->hasMany(Packagetest::class);
    }
}