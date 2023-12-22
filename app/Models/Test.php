<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Test extends BaseModel
{
	use HasTranslation;

	public $translationClass = TestTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}