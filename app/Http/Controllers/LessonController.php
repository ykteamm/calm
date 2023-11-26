<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonUpsertRequest;
use App\Http\Requests\AudioUploadRequest;
use App\Services\LanguageService;
use App\Services\MeditationService;

class LessonController extends Controller
{
    protected LessonService $service;
    protected LanguageService $languageService;
    protected MeditationService $meditationService;

    public function __construct(
        LessonService $service,
        LanguageService $languageService,
        MeditationService $meditationService
    ){
        $this->languageService = $languageService;
        $this->service = $service;
        $this->meditationService = $meditationService;
    }

    public function audioStore(AudioUploadRequest $audioUploadRequest, $lesson)
    {
        return $this->service->storeAsset($lesson, $audioUploadRequest->validated(), true)
            ->redirect('admin.lesson.index');
    }
    
    public function audioCreate($lesson)
    {
        $lesson = $this->service->show($lesson);
        return view('admin.lesson.audio-create', compact('lesson'));
    }

    public function audioUpdate(AudioUploadRequest $audioUploadRequest, $lesson, $audio)
    {
        return $this->service->updateAsset($lesson, $audio, $audioUploadRequest->validated(), true)
            ->redirect('admin.lesson.index');
    }

    public function audioEdit($lesson, $audio)
    {
        $audio = $this->service->getAsset($lesson, $audio);
        $lesson = $this->service->show($lesson);
        return view('admin.lesson.audio-edit', compact('lesson', 'audio'));
    }

    public function audioDelete($lesson, $audio)
    {
        return $this->service->deleteAsset($lesson, $audio, true)->back();
    }

    public function audioDownload($lesson, $audio)
    {
        return $this->service->downloadAsset($lesson, $audio, true);
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['translation'];
        $lessons = $this->service->getList($indexRequest);
        return view('admin.lesson.index', compact('lessons'));
    }

    public function create()
    {
        $this->meditationService->willParseToRelation = ['translation'];
        $meditations = $this->meditationService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.lesson.create', compact('meditations', 'langs'));
    }

    public function store(LessonUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.lesson.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['audio', 'translation'];
        $lesson = $this->service->show($id);
        return view('admin.lesson.show', compact('lesson'));
    }

    public function edit($id)
    {
        $this->meditationService->willParseToRelation = ['translation'];
        $this->service->willParseToRelation = ['audio', 'translation'];
        $meditations = $this->meditationService->getList([]);
        $langs = $this->languageService->getList([]);
        $lesson = $this->service->show($id);
        return view('admin.lesson.edit', compact('lesson', 'meditations', 'langs'));
    }

    public function update($id, LessonUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.lesson.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.lesson.index');
    }
}
