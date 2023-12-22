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
        'type',
        'package_id',
        'medicine_id',
        'order'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}