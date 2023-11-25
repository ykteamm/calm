<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

class MeditationObserver
{
    public function deleted($meditation)
    {
        foreach ($meditation->lessons as $lesson) {
            if(Storage::exists($lesson->path)) Storage::delete($lesson->path);
        }
        $meditation->lessons()->delete();
    }
}
