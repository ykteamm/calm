<?php

namespace App\Http\Controllers;

use App\Services\MeditatorService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\MeditatorUpsertRequest;

class MeditatorController extends Controller
{
    protected MeditatorService $service;

    public function __construct(MeditatorService $service)
    {
        $this->service = $service;
    }

    public function upload(AssetRequest $assetRequest, $meditator)
    {
        return $this->service->storeAsset($meditator, $assetRequest->validated(), true)
            ->redirect('admin.meditator.index');
    }

    public function reupload(AssetRequest $assetRequest, $meditator, $asset)
    {
        return $this->service->updateAsset($meditator, $asset, $assetRequest->validated(), true)
            ->redirect('admin.meditator.index');
    }

    public function unupload($meditator, $asset)
    {
        return $this->service->deleteAsset($meditator, $asset, true)
            ->redirect('admin.meditator.index');
    }

    public function avatar($meditator)
    {
        $this->service->willParseToRelation = ['avatar'];
        $meditator = $this->service->show($meditator);
        return view('admin.meditator.avatar', compact('meditator'));
    }

    public function image($meditator)
    {
        $this->service->willParseToRelation = ['image'];
        $meditator = $this->service->show($meditator);
        return view('admin.meditator.image', compact('meditator'));
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['avatar'];
        $meditators = $this->service->getList($indexRequest);
        return view('admin.meditator.index', compact('meditators'));
    }

    public function create()
    {
        return view('admin.meditator.create');
    }

    public function store(MeditatorUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)
            ->redirect('admin.meditator.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['image', 'avatar'];
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
        return $this->service->edit($id, $upsertRequest->validated(), true)
            ->redirect('admin.meditator.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.meditator.index');
    }
}
