<?php

namespace App\Models;

use App\Traits\HasAsset;
use App\Traits\HasTranslation;

class Issue extends BaseModel
{
	use HasTranslation, HasAsset;

	public $translationClass = IssueTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'results'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'issue_id', 'id');
    }

    public function image()
    {
        return $this->asset();
    }
}