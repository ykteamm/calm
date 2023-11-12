<?php

namespace App\Http\Controllers;

use App\Services\MeditatorService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\MeditatorUpsertRequest;

class MeditatorController extends Controller
{
    protected MeditatorService $service;

    public function __construct(MeditatorService $service)
    {
        $this->service = $service;
    }

    public function avatarUpload(ImageUploadRequest $uploadRequest, $id)
    {
        return $this->service->avatarUpload($id, $uploadRequest->validated());
    }
    
    public function imageUpload(ImageUploadRequest $uploadRequest, $id)
    {
        return $this->service->imageUpload($id, $uploadRequest->validated());
    }

    public function index(IndexRequest $indexRequest)
    {
        $data = $this->service->getList($indexRequest);
        return $data;
    }

    public function store(MeditatorUpsertRequest $upsertRequest)
    {
        $data = $this->service->create($upsertRequest->validated());
        return $data;
    }

    public function show($id)
    {
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, MeditatorUpsertRequest $upsertRequest)
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
