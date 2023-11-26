<?php

namespace App\Http\Controllers;

use App\Services\MeditationService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeditationUpsertRequest;
use App\Services\CategoryService;
use App\Services\LanguageService;
use App\Services\MeditatorService;

class MeditationController extends Controller
{
    protected MeditationService $service;
    protected LanguageService $languageService;
    protected CategoryService $categoryService;
    protected MeditatorService $meditatorService;
    
    public function __construct(
        MeditationService $service, 
        LanguageService $languageService,
        CategoryService $categoryService,
        MeditatorService $meditatorService
    ){
        $this->service = $service;
        $this->languageService = $languageService;
        $this->categoryService = $categoryService;
        $this->meditatorService = $meditatorService;
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
        return view('admin.meditation.create', compact('categories', 'meditators', 'langs'));
    }

    public function store(MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.meditation.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = ['lessons' => ['audio' => [], 'translation' => []]];
        $meditation = $this->service->show($id);
        return view('admin.meditation.show', compact('meditation'));
    }

    public function edit($id)
    {
        $this->categoryService->willParseToRelation = ['translation'];
        $this->service->willParseToRelation = ['translation', 'translations'];
        $meditation = $this->service->show($id);
        $categories = $this->categoryService->getList([]);
        $meditators = $this->meditatorService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.meditation.edit', compact('meditation', 'categories', 'meditators', 'langs'));
    }

    public function update($id, MeditationUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.meditation.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.meditation.index');
    }
}
