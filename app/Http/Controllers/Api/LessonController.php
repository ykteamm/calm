<?php

namespace App\Http\Controllers\Api;

use App\Services\LessonService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AudioUploadRequest;
use App\Http\Requests\LessonUpsertRequest;

class LessonController extends Controller
{
    protected LessonService $service;
    public function __construct(LessonService $service)
    {
        $this->service = $service;
    }

    public function audioUpload(AudioUploadRequest $audioUploadRequest, $id)
    {
        return $this->service->audioUpload($id, $audioUploadRequest->validated());
    }

    public function audioUpdate(AudioUploadRequest $audioUploadRequest, $audio, $id)
    {
        return $this->service->audioUpdate($id, $audio, $audioUploadRequest->validated());
    }

    public function audioDelete($audio, $id)
    {
        return $this->service->audioDelete($id, $audio);
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['audios'];
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(LessonUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated());
    }

    public function show($id)
    {
        return $this->service->showWithResponse($id);
    }

    public function update($id, LessonUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
