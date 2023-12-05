<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Choose extends Component
{
    public $progress = 10;
    public $stress;
    public $sleep;
    public $focus;
    public $mood;

    public function render()
    {
        return view('livewire.choose');
    }

    public function choose()
    {
//        dd($this->stress);
        // Handle form submission logic here
        return redirect()->route('/free-choose-item');
//        return view("user.free.choose_item");
    }

}
