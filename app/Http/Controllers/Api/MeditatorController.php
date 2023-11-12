<?php

namespace App\Http\Controllers\Api;

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
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(MeditatorUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, MeditatorUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
