<?php

namespace App\Http\Controllers;

use App\Services\SteroidService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SteroidUpsertRequest;
use App\Services\LanguageService;
use App\Services\TestService;

class SteroidController extends Controller
{
    protected SteroidService $service;
    protected LanguageService $languageService;
    protected TestService $testService;
    public function __construct(
        SteroidService $service,
        LanguageService $languageService,
        TestService $testService
        )
    {
        $this->service = $service;
        $this->testService = $testService;
        $this->languageService = $languageService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 
            'translations' => []
        ];
        $steroid = $this->service->getList($indexRequest);
        return view('admin.steroid.index', compact('steroid'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.steroid.create', compact('langs'));
    }

    public function store(SteroidUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.steroid.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => [],
            'tests' => ['test' => ['translation' => []]]
        ];
        $steroid = $this->service->show($id);
        return view('admin.steroid.show', compact('steroid'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = [
            'translations',
            'tests' => ['test' => ['translation' => []]]
        ];
        $steroid = $this->service->show($id);
        $this->testService->queryClosure = fn ($q) => $q->whereNotIn('id', $steroid->tests->pluck('id')->toArray());
        $tests = $this->testService->with(['translation'])->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.steroid.edit', compact('langs', 'steroid', 'tests'));
    }

    public function update($id, SteroidUpsertRequest $upsertRequest)
    {
        return $this->service->fullUpdate($upsertRequest->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.steroid.index');
    }
}
