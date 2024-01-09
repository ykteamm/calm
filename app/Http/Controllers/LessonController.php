<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\LessonUpsertRequest;
use App\Http\Requests\AudioUploadRequest;
use App\Models\Lesson;
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
        $data = $audioUploadRequest->validated();
        $data['type'] = Lesson::AUDIO;
        return $this->service->storeAsset($lesson, $data, true)
            ->redirect('admin.lesson.index');
    }
    
    public function audioCreate($lesson)
    {
        $lesson = $this->service->show($lesson);
        return view('admin.lesson.audio-create', compact('lesson'));
    }

    public function audioUpdate(AudioUploadRequest $audioUploadRequest, $lesson, $audio)
    {
        $data = $audioUploadRequest->validated();
        $data['type'] = Lesson::AUDIO;
        return $this->service->updateAsset($lesson, $audio, $data, true)
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

    public function image($lesson)
    {
        $this->service->willParseToRelation = ['image'];
        $lesson = $this->service->show($lesson);
        return view('admin.lesson.image', compact('lesson'));
    }

    public function upload(AssetRequest $assetRequest, $lesson)
    {
        $data = $assetRequest->validated();
        $data['type'] = Lesson::IMAGE;
        return $this->service->storeAsset($lesson, $data, true)
            ->redirect('admin.lesson.index');
    }

    public function reupload(AssetRequest $assetRequest, $lesson, $asset)
    {
        $data = $assetRequest->validated();
        $data['type'] = Lesson::IMAGE;
        return $this->service->updateAsset($lesson, $asset, $data, true)
            ->redirect('admin.lesson.index');
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = ['translation'];
        $lessons = $this->service->getList($indexRequest);
        return view('admin.lesson.index', compact('lessons'));
    }

    public function create()
    {
        $meditations = $this->meditationService->forLesson();
        $langs = $this->languageService->getList([]);
        return view('admin.lesson.create', compact('meditations', 'langs'));
    }

    public function store(LessonUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.lesson.index');
    }

    public function lessonUserShow($id)
    {
        $this->service->willParseToRelation = [
            'audio' => [], 
            'translation' => [],
            'meditation' => [
                'meditator' => [
                    'image'=> [],
                    'avatar' => []
                ]
            ]
        ];
        $lesson = $this->service->show($id);
        $this->service->markAsViewedLesson($id);
        return view('user.meditation.lesson-play', compact('lesson'));
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
        $langs = $this->languageService->getList([]);
        $lesson = $this->service->show($id);
        $meditations = $this->meditationService->except($lesson->meditation_id)->getList([]);
        return view('admin.lesson.edit', compact('lesson', 'meditations', 'langs'));
    }

    public function update($id, LessonUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        if (!isset($data['block'])) {
            $data['block'] = 0;
        }
        return $this->service->edit($id, $data, true)->redirect('admin.lesson.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.lesson.index');
    }
}
