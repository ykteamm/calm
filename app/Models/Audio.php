<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audio extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'extension',
        'duration',
        'folder',
        'audioable_id',
        'audioable_type'
    ];

    public function audioable()
    {
        return $this->morphTo();
    }
}
