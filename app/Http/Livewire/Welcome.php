<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
//    public $progress = 10;

    public function progress()
    {
//        dd($this->count);
//        $this->progress = $this->progress + 30;

        return redirect()->route('/free-choose');
    }


    public function render()
    {
        return view('livewire.welcome');
    }
}
