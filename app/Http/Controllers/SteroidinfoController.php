<?php

namespace App\Http\Controllers;

use App\Services\SteroidinfoService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SteroidinfoUpsertRequest;
use App\Services\LanguageService;
use App\Services\SteroidService;

class SteroidinfoController extends Controller
{
    protected SteroidinfoService $service;
    protected LanguageService $languageService;
    protected SteroidService $steroidService;
    public function __construct(
        SteroidinfoService $service,
        LanguageService $languageService,
        SteroidService $steroidService
        )
    {
        $this->service = $service;
        $this->languageService = $languageService;
        $this->steroidService = $steroidService;
    }
    public function index(IndexRequest $indexRequest)
    {
        $steroidinfo = $this->service->getList($indexRequest);
        return view('admin.steroidinfo.index', compact('steroidinfo'));
    }

    public function create()
    {
        $steroids = $this->steroidService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.steroidinfo.create', compact('langs', 'steroids'));
    }

    public function store(SteroidinfoUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.steroidinfo.index');
    }

    public function show($id)
    {
        $steroidinfo = $this->service->show($id);
        return view('admin.steroidinfo.show', compact('steroidinfo'));
    }

    public function edit($id)
    {
        $steroidinfo = $this->service->show($id);
        $steroids = $this->steroidService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.steroidinfo.edit', compact('langs', 'steroidinfo', 'steroids'));
    }

    public function update($id, SteroidinfoUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.steroidinfo.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.steroidinfo.index');
    }
}
