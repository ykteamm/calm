<?php

namespace App\Http\Controllers;

use App\Services\AimService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AimsUpsertRequest;
use App\Http\Requests\AimUpsertRequest;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\RewardAssetRequest;
use App\Http\Requests\RewardsUpsertRequest;
use App\Http\Requests\RewardUpsertRequest;
use App\Models\Aim;
use App\Models\Reward;
use App\Services\MeditationService;
use App\Services\RewardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
//         dd($aims, $rewards);
//         dd(['a' => $doneAims]);
        // dd(Session::get('aimdone'));
        // dd($rewards->toArray());
        // dd($rewards[1]->images[0]->path);
//        return  $aims;
        return view('user.will.index', [
            'meditations' => $meditations,
            'doneAims' => $doneAims,
            'aims' => $aims,
            'rewards' => $rewards,
        ]);
    }

    public function saveAims(AimsUpsertRequest $aimsUpsertRequest)
    {
//        return $aimsUpsertRequest->all();
//         dd($aimsUpsertRequest->validated());
        return $this->aimService->saveAims($aimsUpsertRequest->validated());
    }

    public function saveRewards(RewardsUpsertRequest $rewardsUpsertRequest)
    {
        return $this->rewardService->saveRewards($rewardsUpsertRequest->validated());
    }

    public function updateRewardFelings(RewardUpsertRequest $rewardUpsertRequest, $reward)
    {
        return $this->rewardService->edit($reward, $rewardUpsertRequest->validated(), true)
            ->redirect('will.index');
    }

    public function rewardThanks($reward)
    {
        $reward = $this->rewardService->show($reward);
        return view('user.will.thanks', [
            'reward' => $reward
        ]);
    }

    public function upload(RewardAssetRequest $assetRequest, $reward)
    {
        $data = $assetRequest->validated();

        $data['type'] = Reward::IMAGE;
        return $this->rewardService->storeAsset($reward, $data, true)
            ->redirect('will.index');
    }

    public function reupload(RewardAssetRequest $assetRequest, $reward, $asset)
    {
        $data = $assetRequest->validated();
        $data['type'] = Reward::IMAGE;
        return $this->rewardService->updateAsset($reward, $asset, $data, true)
            ->redirect('will.index');
    }

    public function unupload($reward, $asset)
    {
        return $this->rewardService->deleteAsset($reward, $asset, true)
            ->redirect('will.index');
    }
}
