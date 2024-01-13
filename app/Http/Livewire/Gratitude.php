<?php

namespace App\Http\Livewire;

use App\Services\GratitudeService;
use Livewire\Component;

class Gratitude extends Component
{
    protected GratitudeService $gratitudeService;
    public $gratitude = null;
    public function __construct()
    {
        $this->gratitudeService = resolve(GratitudeService::class);
    }

    public function changeQuestion($gratitude) 
    {
        if ($data = $this->gratitudeService->getRandomly($gratitude)) {
            // dd($data);
            // dd($this->gratitude, $data);
            $this->gratitude = $data;
        }
    }

    public function mount()
    {
        $this->gratitude = $this->gratitudeService->getRandomly($this->gratitude);
    }
    public function render()
    {
        return view('livewire.gratitude');
    }
}
