<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'extension',
        'folder',
        'avatarable_id',
        'avatarable_type'
    ];

    public function avatarable()
    {
        return $this->morphTo();
    }
}
