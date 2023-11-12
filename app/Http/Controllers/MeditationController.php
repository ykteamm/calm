<?php

namespace App\Http\Controllers;

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
        $data = $this->service->getList($indexRequest);
        return $data;
    }

    public function store(MeditationUpsertRequest $upsertRequest)
    {
        $data = $this->service->create($upsertRequest->validated());
        return $data;
    }

    public function show($id)
    {
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, MeditationUpsertRequest $upsertRequest)
    {
        $data = $this->service->edit($id, $upsertRequest->validated());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return $data;
    }
}
