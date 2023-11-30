<?php

namespace App\Models;

use App\Models\BaseTranslation;

class IssueTranslation extends BaseTranslation
{
    protected $table = 'issue_translations';

    public $timestamps = false;

    protected $guarded = [];
}
