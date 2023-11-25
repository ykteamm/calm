<?php

namespace App\Http\Controllers;

use App\Services\MeditationService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\MeditationUpsertRequest;
use App\Services\LanguageService;

class MeditationController extends Controller
{
    protected MeditationService $service;
    protected LanguageService $languageService;
    public function __construct(MeditationService $service, LanguageService $languageService)
    {
        $this->service = $service;
        $this->languageService = $languageService;
    }

    public function upload(AssetRequest $assetRequest, $meditation)
    {
        return $this->service->storeAsset($meditation, $assetRequest->validated());
    }

    public function reupload(AssetRequest $assetRequest, $meditation, $asset)
    {
        return $this->service->updateAsset($meditation, $asset, $assetRequest->validated());
    }

    public function unupload($meditation, $asset)
    {
        return $this->service->deleteAsset($meditation, $asset);
    }

    public function audio($meditation)
    {
        $this->service->willParseToRelation = ['assets'];
        $meditation = $this->service->show($meditation);
        $langs = $this->languageService->getList([]);
        return view('admin.meditation.audio', compact('meditation', 'langs'));
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['assets'];
        $meditations = $this->service->getList($indexRequest);
        return view('admin.meditation.index', compact('meditations'));
    }

    public function create()
    {
        return view('admin.meditation.create');
    }

    public function store(MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated())->redirect('admin.meditation.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['assets'];
        $meditation = $this->service->show($id);
        return view('admin.meditation.show', compact('meditation'));
    }

    public function edit($id)
    {
        $meditation = $this->service->show($id);
        return view('admin.meditation.edit', compact('meditation'));
    }

    public function update($id, MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated())->redirect('admin.meditation.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id)->redirect('admin.meditation.index');
    }

    // public function show($id)
    // {
    //     // $this->service->queryClosure = function ($q) {
    //     //     $q->with(['translation', 'lessons.audios', 'meditation.image', 'meditation.avatar']);
    //     // };
    //     $this->service->willParseToRelation = [
    //         'translation' => ['object_id', 'name'],
    //         'lessons' => [
    //             'id', 'meditation_id', 
    //             'audios' => ['audioable_id', 'name', 'extension', 'folder', 'duration']
    //         ],
    //         'meditation' => [
    //             'id','firstname', 'lastname', 
    //             'image' => ['name', 'extension', 'folder', 'imageable_id'],
    //             'avatar' => ['name', 'extension', 'folder', 'avatarable_id']
    //         ]
    //     ];
        
    //     $data = $this->service->show($id);
    //     // return $data;
    //     return view('user.meditation.play',[
    //         'medidation' => $data
    //     ]);
    // }
}
