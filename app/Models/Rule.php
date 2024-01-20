<?php

namespace App\Models;

class Rule extends BaseModel
{
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'result_id',
        'min',
        'max'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function result()
    {
        return $this->belongsTo(Package::class);
    }
}