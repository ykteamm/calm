<?php

namespace App\Http\Controllers;

use App\Services\AimService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AimsUpsertRequest;
use App\Http\Requests\AimUpsertRequest;
use App\Models\Aim;
use App\Services\MeditationService;

class WillController extends Controller
{
    protected AimService $aimService;
    protected MeditationService $meditationService;
    public function __construct(
        AimService $aimService,
        MeditationService $meditationService
    )
    {
        $this->aimService = $aimService;
        $this->meditationService = $meditationService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $aims = $this->aimService->weekAims();
        $meditations = $this->meditationService->getAllByCatName('will');
        return view('user.will.index', [
            'meditations' => $meditations,
            'aims' => $aims
        ]);
    }

    public function saveAims(AimsUpsertRequest $aimsUpsertRequest)
    {
        return $this->aimService->saveAims($aimsUpsertRequest->validated());
    }
}
