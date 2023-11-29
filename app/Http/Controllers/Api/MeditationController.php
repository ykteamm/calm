<?php

namespace App\Http\Controllers\Api;

use App\Services\MeditationService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeditationUpsertRequest;

class MeditationController extends Controller
{
    protected MeditationService $service;
    public function __construct(MeditationService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        return $this->service->getList($indexRequest->validated());
    }

    public function store(MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
