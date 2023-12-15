<?php

namespace App\Models;

class UserVariant extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'variant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }
}