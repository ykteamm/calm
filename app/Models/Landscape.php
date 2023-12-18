<?php

namespace App\Models;

use App\Traits\HasAsset;
use Illuminate\Support\Facades\Storage;

class Landscape extends BaseModel
{
    const VIDEO = 10;
    const AUDIO = 20;
    const IMAGE = 30;

    use HasAsset;
    
    protected $guarded = [];

    protected $fillable = [
        'name'
    ];

    public static function boot()
    {
        self::deleted(function($model) {
            if($model->video && Storage::exists($path = $model->video->path)) {
                Storage::delete($path);
                $model->video->delete();
            }
            if($model->audio && Storage::exists($path = $model->audio->path)) {
                Storage::delete($path);
                $model->audio->delete();
            }
            if($model->image && Storage::exists($path = $model->image->path)) {
                Storage::delete($path);
                $model->image->delete();
            }
        });
        parent::boot();
    }

    public function assetTypes()
    {
        return [
            static::VIDEO => $this->video(),
            static::AUDIO => $this->audio(),
            static::IMAGE => $this->image()
        ];
    }

    public function video()
    {
        return $this->asset()->where('type', self::VIDEO);
    }

    public function audio()
    {
        return $this->asset()->where('type', self::AUDIO);
    }

    public function image()
    {
        return $this->asset()->where('type', self::IMAGE);
    }
}