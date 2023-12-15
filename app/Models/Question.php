<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Question extends BaseModel
{
	use HasTranslation;

	public $translationClass = QuestionTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'issue_id',
        'category_id',
        'type'
    ];


    public function variants()
    {
        return $this->hasMany(Variant::class, 'question_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id', 'id');
    }
}