<?php

namespace App\Http\Controllers;

use App\Services\MotivationService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MotivationUpsertRequest;
use App\Services\LanguageService;

class MotivationController extends Controller
{
    protected LanguageService $languageService;
    protected MotivationService $service;
    public function __construct(
        MotivationService $service,
        LanguageService $languageService
    ){
        $this->languageService = $languageService;
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 
            'translations' => []
        ];
        $motivation = $this->service->getList($indexRequest);
        return view('admin.motivation.index', compact('motivation'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.motivation.create', compact('langs'));
    }

    public function store(MotivationUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.motivation.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => []
        ];
        $motivation = $this->service->show($id);
        return view('admin.motivation.show', compact('motivation'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $motivation = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.motivation.edit', compact('langs', 'motivation'));
    }

    public function update($id, MotivationUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.motivation.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.motivation.index');
    }
}
