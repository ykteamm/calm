<?php

namespace App\Http\Controllers;

use App\Enums\QuestionTypeEnum;
use App\Services\QuestionService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionUpsertRequest;
use App\Services\CategoryService;
use App\Services\IssueService;
use App\Services\LanguageService;

class QuestionController extends Controller
{
    protected QuestionService $service;
    protected LanguageService $languageService;
    protected IssueService $issueService;
    protected CategoryService $categoryService; 
    public function __construct(
        QuestionService $service,
        LanguageService $languageService,
        IssueService $issueService,
        CategoryService $categoryService
    ){
        $this->languageService = $languageService;
        $this->issueService = $issueService;
        $this->service = $service;
        $this->categoryService = $categoryService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $question = $this->service->getList($indexRequest);
        return view('admin.question.index', compact('question'));
    }

    public function create()
    {
        $this->issueService->willParseToRelation = ['translation' => ['object_id', 'name']];
        $this->categoryService->willParseToRelation = ['translation' => ['object_id', 'name']];
        $categories = $this->categoryService->getList([]);
        $issues = $this->issueService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.question.create', compact('langs', 'issues', 'categories'));
    }

    public function store(QuestionUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.question.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $question = $this->service->show($id);
        return view('admin.question.show', compact('question'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $question = $this->service->show($id);
        $issues = $this->issueService->getList([]);
        $langs = $this->languageService->getList([]);
        $this->categoryService->willParseToRelation = ['translation' => ['object_id', 'name']];
        $categories = $this->categoryService->getList([]);
        return view('admin.question.edit', compact('langs', 'question', 'types', 'categories'));
    }

    public function update($id, QuestionUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.question.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.question.index');
    }
}
