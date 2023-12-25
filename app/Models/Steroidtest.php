<?php

namespace App\Models;

class Steroidtest extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'steroid_id',
        'test_id',
        'percent'
    ];

    public function steroid()
    {
        return $this->belongsTo(Steroid::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}