<?php

namespace App\Http\Controllers;

use App\Services\LandscapeService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\LandscapeUpsertRequest;
use App\Models\Landscape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandscapeController extends Controller
{
    protected LandscapeService $service;
    public function __construct(LandscapeService $service)
    {
        $this->service = $service;
    }

    public function landscapeSaveSession(Request $request)
    {
        Session::put('landscape', $request->input('landscape'));
        Session::put('landscape_audio_path', $request->input('landscape_audio_path'));
        Session::put('landscape_video_path', $request->input('landscape_video_path'));
        return response()->json(['message' => Session::get('landscape')]);
    }

    public function upload(AssetRequest $assetRequest, $landscape)
    {
        return $this->service->storeAsset($landscape, $assetRequest->validated(), true)
            ->redirect('admin.landscape.index');
    }

    public function reupload(AssetRequest $assetRequest, $landscape, $asset)
    {
        return $this->service->updateAsset($landscape, $asset, $assetRequest->validated(), true)
            ->redirect('admin.landscape.index');
    }

    public function unupload($landscape, $asset)
    {
        return $this->service->deleteAsset($landscape, $asset, true)
            ->redirect('admin.landscape.index');
    }

    public function video($landscape)
    {
        $this->service->willParseToRelation = ['video'];
        $type = Landscape::VIDEO;
        $landscape = $this->service->show($landscape);
        return view('admin.landscape.video', compact('landscape', 'type'));
    }

    public function image($landscape)
    {
        $this->service->willParseToRelation = ['image'];
        $type = Landscape::IMAGE;
        $landscape = $this->service->show($landscape);
        return view('admin.landscape.image', compact('landscape', 'type'));
    }

    public function audio($landscape)
    {
        $this->service->willParseToRelation = ['audio'];
        $type = Landscape::AUDIO;
        $landscape = $this->service->show($landscape);
        return view('admin.landscape.audio', compact('landscape', 'type'));
    }


    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['image'];
        $landscapes = $this->service->getList($indexRequest);
        return view('admin.landscape.index', compact('landscapes'));
    }

    public function create()
    {
        return view('admin.landscape.create');
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['video', 'audio', 'image'];
        $landscape = $this->service->show($id);
        return view('admin.landscape.edit', compact('landscape'));
    }

    public function update(LandscapeUpsertRequest $upsertRequest, $id)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)
            ->redirect('admin.landscape.index');
    }

    public function store(LandscapeUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)
            ->redirect('admin.landscape.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['video', 'audio', 'image'];
        $landscape = $this->service->show($id);
        return view('admin.landscape.show', compact('landscape'));
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.landscape.index');
    }
}
