<?php

namespace App\Observers;

class MeditatorObserver
{
    public function deleted($meditator)
    {
        if($meditator->avatar) {
            mediaDelete($meditator->avatar);
            $meditator->avatar->delete();
        };
        if($meditator->image) {
            mediaDelete($meditator->image);
            $meditator->image->delete();
        }
    }
}
