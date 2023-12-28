<?php

namespace App\Http\Controllers\Api;

use App\Services\RewardService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RewardUpsertRequest;

class RewardController extends Controller
{
    protected RewardService $service;
    public function __construct(RewardService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(RewardUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, RewardUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
