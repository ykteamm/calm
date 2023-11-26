<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

class MeditationObserver
{
    public function deleted($meditation)
    {
        foreach ($meditation->lessons as $lesson) {
            if($lesson->audio) {
                if(Storage::exists($lesson->audio->path)) Storage::delete($lesson->audio->path);
            }
            $lesson->audio()->delete();
        }
        $meditation->lessons()->delete();
    }
}
