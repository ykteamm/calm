<?php

namespace App\Http\Controllers;

use App\Services\GratitudeService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\GratitudeUpsertRequest;
use App\Services\LanguageService;

class GratitudeController extends Controller
{
    protected LanguageService $languageService;
    protected GratitudeService $service;
    public function __construct(
        GratitudeService $service,
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
        $gratitude = $this->service->getList($indexRequest);
        return view('admin.gratitude.index', compact('gratitude'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.gratitude.create', compact('langs'));
    }

    public function store(GratitudeUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.gratitude.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => []
        ];
        $gratitude = $this->service->show($id);
        return view('admin.gratitude.show', compact('gratitude'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $gratitude = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.gratitude.edit', compact('langs', 'gratitude'));
    }

    public function update($id, GratitudeUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.gratitude.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.gratitude.index');
    }
}
