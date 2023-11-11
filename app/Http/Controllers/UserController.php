<?php

namespace App\Http\Controllers;

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
        $data = $this->service->getList($indexRequest);
        return $data;
    }

    public function store(UserUpsertRequest $upsertRequest)
    {
        $data = $this->service->create($upsertRequest->validated());
        return $data;
    }

    public function show($id)
    {
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, UserUpsertRequest $upsertRequest)
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
