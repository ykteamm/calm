<?php

namespace App\Http\Controllers;

use App\Services\AimService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AimsUpsertRequest;
use App\Http\Requests\AimUpsertRequest;
use App\Http\Requests\RewardsUpsertRequest;
use App\Models\Aim;
use App\Services\MeditationService;
use App\Services\RewardService;

class WillController extends Controller
{
    protected AimService $aimService;
    protected MeditationService $meditationService;
    protected RewardService $rewardService;
    public function __construct(
        AimService $aimService,
        MeditationService $meditationService,
        RewardService $rewardService
    )
    {
        $this->aimService = $aimService;
        $this->meditationService = $meditationService;
        $this->rewardService = $rewardService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $aims = $this->aimService->weekAims();
        $rewards = $this->rewardService->weekRewards();
        $meditations = $this->meditationService->getAllByCatName('will');
        $doneAims = $this->aimService->doneAims();
        return view('user.will.index', [
            'meditations' => $meditations,
            'doneAims' => $doneAims,
            'aims' => $aims,
            'rewards' => $rewards,
        ]);
    }

    public function saveAims(AimsUpsertRequest $aimsUpsertRequest)
    {
        return $this->aimService->saveAims($aimsUpsertRequest->validated());
    }

    public function saveRewards(RewardsUpsertRequest $rewardsUpsertRequest)
    {
        return $this->rewardService->saveRewards($rewardsUpsertRequest->validated());
    }
}
