<?php

namespace App\Http\Controllers\Api;

use App\Services\SteroidinfoService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SteroidinfoUpsertRequest;

class SteroidinfoController extends Controller
{
    protected SteroidinfoService $service;
    public function __construct(SteroidinfoService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(SteroidinfoUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, SteroidinfoUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
