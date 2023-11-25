<?php

namespace App\Observers;

class MeditatorObserver
{
    public function deleted($meditator)
    {
        if($meditator->avatar) {
            $meditator->avatar->delete();
        }
        if($meditator->image) {
            $meditator->image->delete();
        }
    }
}
