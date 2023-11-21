<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageUpsertRequest;
use App\Services\LanguageService;

class LanguageController extends Controller
{
    protected LanguageService $service;
    public function __construct(
        LanguageService $service
    )
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $languages = $this->service->getList($indexRequest);
        return view('admin.language.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(LanguageUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated())->redirect('admin.language.index');
    }

    public function show($id)
    {
        $language = $this->service->show($id);
        return view('admin.language.show', compact('language'));
    }

    public function edit($id)
    {
        $language = $this->service->show($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update($id, LanguageUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        if(!isset($data['is_active'])) $data['is_active'] = '0';
        return $this->service->edit($id, $data)->redirect('admin.language.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id)->redirect('admin.language.index');
    }
}
