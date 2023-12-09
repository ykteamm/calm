<?php

namespace App\Http\Controllers;

use App\Services\EmojiService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\EmojiUpsertRequest;

class EmojiController extends Controller
{
    protected EmojiService $service;
    public function __construct(EmojiService $service)
    {
        $this->service = $service;
    }


    public function upload(AssetRequest $assetRequest, $emoji)
    {
        return $this->service->storeAsset($emoji, $assetRequest->validated(), true)
            ->redirect('admin.emoji.index');
    }

    public function reupload(AssetRequest $assetRequest, $emoji, $asset)
    {
        return $this->service->updateAsset($emoji, $asset, $assetRequest->validated(), true)
            ->redirect('admin.emoji.index');
    }

    public function unupload($emoji, $asset)
    {
        return $this->service->deleteAsset($emoji, $asset, true)
            ->redirect('admin.emoji.index');
    }

    public function image($emoji)
    {
        $this->service->willParseToRelation = ['image'];
        $emoji = $this->service->show($emoji);
        return view('admin.emoji.image', compact('emoji'));
    }


    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['image'];
        $emojies = $this->service->getList($indexRequest);


        return view('admin.emoji.index', compact('emojies'));
    }

    public function create()
    {
        return view('admin.emoji.create');
    }

    public function store(EmojiUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.emoji.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['image'];
        $emoji = $this->service->show($id);
        return view('admin.emoji.show', compact('emoji'));
    }

    public function edit($id)
    {
        $emoji = $this->service->show($id);
        return view('admin.emoji.edit', compact('emoji'));
    }

    public function update($id, EmojiUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        return $this->service->edit($id, $data, true)->redirect('admin.emoji.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.emoji.index');
    }
}
