<?php

namespace App\Models;

class Packagetest extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'test_id',
        'percent'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}