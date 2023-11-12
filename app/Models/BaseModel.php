<?php

namespace App\Models;

use App\Traits\ModelRandom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory, ModelRandom;

    protected $connection = 'pgsql';

    public $translationClass;
    
    public $codeField;
}
