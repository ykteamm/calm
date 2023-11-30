<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Variant extends BaseModel
{
	use HasTranslation;

	public $translationClass = VariantTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}