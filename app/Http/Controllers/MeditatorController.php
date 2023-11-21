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
        return $this->service->avatarUploadWeb($id, $uploadRequest->validated())->redirect('admin.meditator.index');
    }

    public function avatar($meditator)
    {
        return view('admin.meditator.avatar', compact('meditator'));
    }
    
    public function imageUpload(ImageUploadRequest $uploadRequest, $id)
    {
        return $this->service->imageUploadWeb($id, $uploadRequest->validated())->redirect('admin.meditator.index');
    }

    public function image($meditator)
    {
        return view('admin.meditator.image', compact('meditator'));
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'image', 'avatar'
        ];
        $meditators = $this->service->getList($indexRequest);
        // return $meditators;
        return view('admin.meditator.index', compact('meditators'));
    }

    public function create()
    {
        return view('admin.meditator.create');
    }

    public function store(MeditatorUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated())->redirect('admin.meditator.index');
    }

    public function show($id)
    {
        $meditator = $this->service->show($id);
        return view('admin.meditator.show', compact('meditator'));
    }

    public function edit($id)
    {
        $meditator = $this->service->show($id);
        return view('admin.meditator.edit', compact('meditator'));
    }

    public function update($id, MeditatorUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated())->redirect('admin.meditator.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id)->redirect('admin.meditator.index');
    }
}
