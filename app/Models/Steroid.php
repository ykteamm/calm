<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Steroid extends BaseModel
{
	use HasTranslation;

	public $translationClass = SteroidTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'avg'
    ];

    public function tests()
    {
        return $this->hasMany(Steroidtest::class);
    }

    public function infos()
    {
        return $this->hasMany(Steroidinfo::class);
    }
}