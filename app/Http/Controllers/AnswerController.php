<?php

namespace App\Http\Controllers;

use App\Services\AnswerService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerUpsertRequest;
use App\Services\LanguageService;
use App\Services\TestService;

class AnswerController extends Controller
{
    protected AnswerService $service;
    protected LanguageService $languageService;
    protected TestService $testService;
    public function __construct(
        AnswerService $service,
        LanguageService $languageService,
        TestService $testService
    ){
        $this->languageService = $languageService;
        $this->testService = $testService;
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $answer = $this->service->getList($indexRequest);
        return view('admin.answer.index', compact('answer'));
    }

    public function create()
    {
        $tests = $this->testService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.answer.create', compact('langs', 'tests'));
    }

    public function store(AnswerUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.answer.index');
    }

    public function show($id)
    {
        $answer = $this->service->show($id);
        return view('admin.answer.show', compact('answer'));
    }

    public function edit($id)
    {
        $answer = $this->service->show($id);
        $tests = $this->testService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.answer.edit', compact('langs', 'answer', 'tests'));
    }

    public function update($id, AnswerUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.answer.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.answer.index');
    }
}
