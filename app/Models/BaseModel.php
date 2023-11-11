<?php

namespace App\Models;

use App\Traits\HasLog;
use App\Traits\TableColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    public $translationClass;
    
    public $codeField;
}
