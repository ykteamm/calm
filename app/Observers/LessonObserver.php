<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    public function deleted($lesson)
    {
        if($lesson->audio) {
            if(Storage::exists($lesson->audio->path)) Storage::delete($lesson->audio->path);
        }
        $lesson->audio()->delete();
    }
}
