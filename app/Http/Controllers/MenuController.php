<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuUpsertRequest;

class MenuController extends Controller
{
    protected MenuService $service;
    public function __construct(MenuService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $data = $this->service->getList($indexRequest);
        return $data;
    }

    public function store(MenuUpsertRequest $upsertRequest)
    {
        $data = $this->service->create($upsertRequest->validated());
        return $data;
    }

    public function show($id)
    {
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, MenuUpsertRequest $upsertRequest)
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
