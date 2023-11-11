<?php

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\UserUpsertRequest;

class UserController extends Controller
{
    protected UserService $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function avatarUpload(ImageUploadRequest $uploadRequest, $id)
    {
        return $this->service->avatarUpload($id, $uploadRequest->validated());
    }
    
    public function backgroundUpload(ImageUploadRequest $uploadRequest, $id)
    {
        return $this->service->backgroundUpload($id, $uploadRequest->validated());
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['avatar'];
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(UserUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, UserUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
