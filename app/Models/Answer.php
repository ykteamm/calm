<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Answer extends BaseModel
{
	use HasTranslation;

	public $translationClass = AnswerTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'test_id',
        'order',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}