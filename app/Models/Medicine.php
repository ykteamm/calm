<?php

namespace App\Models;

use App\Traits\HasTranslation;

class Medicine extends BaseModel
{
	use HasTranslation;

	public $translationClass = MedicineTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        
    ];


    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}