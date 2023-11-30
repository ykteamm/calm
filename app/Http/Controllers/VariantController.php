<?php

namespace App\Http\Controllers;

use App\Services\VariantService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\VariantUpsertRequest;
use App\Services\LanguageService;
use App\Services\QuestionService;

class VariantController extends Controller
{
    protected VariantService $service;
    protected LanguageService $languageService;
    protected QuestionService $questionService; 
    public function __construct(
        VariantService $service,
        LanguageService $languageService,
        QuestionService $questionService
    ){
        $this->languageService = $languageService;
        $this->questionService = $questionService;
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $variant = $this->service->getList($indexRequest);
        return view('admin.variant.index', compact('variant'));
    }

    public function create()
    {
        $this->questionService->willParseToRelation = ['translation' => ['object_id', 'name']];
        $questions = $this->questionService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.variant.create', compact('langs', 'questions'));
    }

    public function store(VariantUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.variant.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $variant = $this->service->show($id);
        return view('admin.variant.show', compact('variant'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $variant = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        $this->questionService->willParseToRelation = ['translation' => ['object_id', 'name']];
        $questions = $this->questionService->getList([]);
        return view('admin.variant.edit', compact('langs', 'variant', 'questions'));
    }

    public function update($id, VariantUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.variant.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.variant.index');
    }
}
