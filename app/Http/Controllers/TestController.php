<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestUpsertRequest;
use App\Services\LanguageService;

class TestController extends Controller
{
    protected TestService $service;
    protected LanguageService $languageService;
    public function __construct(
        TestService $service,
        LanguageService $languageService
    )
    {
        $this->languageService = $languageService;
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 
            'translations' => []
        ];
        $test = $this->service->getList($indexRequest);
        return view('admin.test.index', compact('test'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.test.create', compact('langs'));
    }

    public function store(TestUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.test.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => [],
            'answers' => ['translation' => []]
        ];
        $test = $this->service->show($id);
        return view('admin.test.show', compact('test'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $test = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.test.edit', compact('langs', 'test'));
    }

    public function update($id, TestUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.test.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.test.index');
    }
}
