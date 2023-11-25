<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpsertRequest;
use App\Services\LanguageService;

class CategoryController extends Controller
{
    protected CategoryService $service;
    protected LanguageService $languageService;
    public function __construct(
        CategoryService $service,
        LanguageService $languageService
    )
    {
        $this->service = $service;
        $this->languageService = $languageService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $categories = $this->service->getList($indexRequest);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.category.create', compact('langs'));
    }

    public function store(CategoryUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.category.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $category = $this->service->show($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $category = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.category.edit', compact('langs', 'category'));
    }

    public function update($id, CategoryUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.category.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.category.index');
    }
}
