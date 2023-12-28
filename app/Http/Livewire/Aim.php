<?php

namespace App\Http\Livewire;

use App\Services\AimService;
use Livewire\Component;

class Aim extends Component
{
    public $aims;
    private AimService $aimService;
    public function __construct()
    {
        $this->aimService = resolve(AimService::class);
    }

    public function mount()
    {
        $this->aims = $this->aimService->randomly(3);
    }

    public function render()
    {
        return view('livewire.aim');
    }

    public function change($index)
    {
        $this->aims[$index] = $this->aimService->randomOne($this->aims->pluck('id')->toArray());
    }
}
