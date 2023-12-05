<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChooseItem extends Component
{
    public $progress = 10;
//    public $stress;
//    public $sleep;
//    public $mood;
//    public $focus;

    public function render()
    {
        return view('livewire.choose-item');
    }

//    public function choose_item(){
//        dd($this->stress);
////        return $this->stress;
//    }
//    public function progress()
//    {
//        $this->progress = $this->progress + 10;
//    }
}
