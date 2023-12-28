<?php

namespace App\Http\Livewire;

use App\Services\RewardService;
use Livewire\Component;

class Reward extends Component
{
    public $rewards;
    private RewardService $rewardService;
    public function __construct()
    {
        $this->rewardService = resolve(RewardService::class);
    }

    public function mount()
    {
        $this->rewards = $this->rewardService->randomly(3);
    }

    public function change($index)
    {
        $this->rewards[$index] = $this->rewardService->randomOne($this->rewards->pluck('id')->toArray());
    }

    public function render()
    {
        return view('livewire.reward');
    }
}
