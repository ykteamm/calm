<?php

namespace App\Observers;

class LessonObserver
{
    public function deleted($lesson)
    {
        $audios = $lesson->audios;
        foreach ($audios as $audio) {
            mediaDelete($audio);
            $audio->delete();
        }
    }
}
