<?php

namespace App\Http\Controllers\Api;

use App\Services\SteroidService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SteroidUpsertRequest;

class SteroidController extends Controller
{
    protected SteroidService $service;
    public function __construct(SteroidService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(SteroidUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, SteroidUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
