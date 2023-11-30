<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Issue extends BaseModel
{
	use HasTranslation;

	public $translationClass = IssueTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'issue_id', 'id');
    }
}