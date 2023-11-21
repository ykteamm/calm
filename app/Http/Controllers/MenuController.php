<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuUpsertRequest;
use App\Services\LanguageService;

class MenuController extends Controller
{
    protected MenuService $service;
    protected LanguageService $languageService;
    public function __construct(
        MenuService $service,
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
        $menu = $this->service->getList($indexRequest);
        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.menu.create', compact('langs'));
    }

    public function store(MenuUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated())->redirect('admin.menu.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $menu = $this->service->show($id);
        return view('admin.menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $menu = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.menu.edit', compact('langs', 'menu'));
    }

    public function update($id, MenuUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated())->redirect('admin.menu.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id)->redirect('admin.menu.index');
    }
}
