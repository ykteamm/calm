<?php

namespace App\Http\Controllers;

use App\Services\FeelingService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeelingUpsertRequest;

class FeelingController extends Controller
{
    protected FeelingService $service;
    public function __construct(FeelingService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $data = $this->service->getList($indexRequest);
        return $data;
    }

    public function store(FeelingUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->back();
    }

    public function show($id)
    {
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, FeelingUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->back();
    }

    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return $data;
    }
}
