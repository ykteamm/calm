<?php

namespace App\Http\Controllers;

use App\Enums\MeditationGroupEnum;
use App\Enums\MeditationTypeEnum;
use App\Services\MeditationService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeditationUpsertRequest;
use App\Services\CategoryService;
use App\Services\LanguageService;
use App\Services\LessonService;
use App\Services\MeditatorService;

class MeditationController extends Controller
{
    protected MeditationService $service;
    protected LanguageService $languageService;
    protected CategoryService $categoryService;
    protected MeditatorService $meditatorService;
    protected LessonService $lessonService;
    public function __construct(
        MeditationService $service,
        LanguageService $languageService,
        CategoryService $categoryService,
        MeditatorService $meditatorService,
        LessonService $lessonService
    ){
        $this->service = $service;
        $this->languageService = $languageService;
        $this->categoryService = $categoryService;
        $this->meditatorService = $meditatorService;
        $this->lessonService = $lessonService;
    }



    public function recentlyViewed(IndexRequest $indexRequest)
    {
        return $this->service->recentlyViewed($indexRequest->validated());
    }

    // public function popularByCategory(IndexRequest $indexRequest)
    // {
    //     return $this->service->popularByCategory($indexRequest->validated());
    // }

    public function markAsViewed($meditation)
    {
        return $this->service->markAsViewed($meditation);
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'lessons' => ['translation' => []],
            'translation' => [],
            'meditator' => [],
            'category' => ['translation' => []]
        ];
        $meditations = $this->service->getList($indexRequest);
        return view('admin.meditation.index', compact('meditations'));
    }

    public function create()
    {
        $this->categoryService->willParseToRelation = ['translation'];
        $categories = $this->categoryService->getList([]);
        $meditators = $this->meditatorService->getList([]);
        $langs = $this->languageService->getList([]);
        $groups = MeditationGroupEnum::list(true);
        $types = MeditationTypeEnum::list(true);
        return view('admin.meditation.create', compact('categories', 'meditators', 'langs', 'groups', 'types'));
    }

    public function store(MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.meditation.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'lessons' => [
                fn ($q) => $q->orderBy('block', 'ASC'),
                'image' => [],
                'audio' => [],
                'translation' => []
            ],
            'meditator' => [
                'image'=> [],
                'avatar' => []
            ],
        ];
        if ($meditation = $this->service->show($id)) {
            $meditation->type = MeditationTypeEnum::getLabel($meditation->type);
            $meditation->group = MeditationGroupEnum::getLabel($meditation->group);
            // difd($meditation);
            // return $meditation;
            return view('admin.meditation.show', compact('meditation'));
        } else {
            return ['message' => 'NOt found'];
        }

    }

    public function edit($id)
    {
        $this->categoryService->willParseToRelation = ['translation'];
        $this->service->willParseToRelation = ['translation', 'translations'];
        $meditation = $this->service->show($id);
        $categories = $this->categoryService->getList([]);
        $meditators = $this->meditatorService->getList([]);
        $langs = $this->languageService->getList([]);
        $groups = MeditationGroupEnum::list(true);
        $types = MeditationTypeEnum::list(true);
        return view('admin.meditation.edit', compact('meditation', 'categories', 'meditators', 'langs', 'groups', 'types'));
    }

    public function update($id, MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.meditation.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.meditation.index');
    }

    public function play($id)
    {
        $this->service->willParseToRelation = [
            'lessons' => [
                fn ($q) => $q->orderBy('block', 'ASC'),
                'image' => [],
                'audio' => [],
                'translation' => []
            ],
            'meditator' => [
                'image'=> [],
                'avatar' => []
            ],
        ];
        $meditation = $this->service->show($id);
        // difd($meditation);
//         return $meditation;
        return view('user.meditation.play', compact('meditation', 'id'));
    }
}
