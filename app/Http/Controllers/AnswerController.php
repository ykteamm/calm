<?php

namespace App\Http\Controllers;

use App\Enums\AnswerTypeEnum;
use App\Services\AnswerService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerUpsertRequest;
use App\Services\LanguageService;
use App\Services\MedicineService;
use App\Services\PackageService;
use App\Services\TestService;

class AnswerController extends Controller
{
    protected AnswerService $service;
    protected LanguageService $languageService;
    protected TestService $testService;
    protected PackageService $packageService;
    protected MedicineService $medicineService;
    public function __construct(
        AnswerService $service,
        LanguageService $languageService,
        TestService $testService,
        PackageService $packageService,
        MedicineService $medicineService
    ){
        $this->languageService = $languageService;
        $this->testService = $testService;
        $this->service = $service;
        $this->packageService = $packageService;
        $this->medicineService = $medicineService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $answer = $this->service->getList($indexRequest);
        return view('admin.answer.index', compact('answer'));
    }

    public function create()
    {
        $types = AnswerTypeEnum::list(true);
        $tests = $this->testService->getList([]);
        $medicines = $this->medicineService->getList([]);
        $packages = $this->packageService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.answer.create', compact('langs', 'medicines', 'packages', 'types', 'tests'));
    }

    public function store(AnswerUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        if ($data['type'] == AnswerTypeEnum::MEDICINE) {
            unset($data['package_id']); 
        } else if ($data['type'] == AnswerTypeEnum::PACKAGE) {
            unset($data['medicine_id']); 
        }
        return $this->service->create($data, true)->redirect('admin.answer.index');
    }

    public function show($id)
    {
        $answer = $this->service->show($id);
        return view('admin.answer.show', compact('answer'));
    }

    public function edit($id)
    {
        $types = AnswerTypeEnum::list(true);
        $answer = $this->service->show($id);
        $tests = $this->testService->getList([]);
        $medicines = $this->medicineService->getList([]);
        $packages = $this->packageService->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.answer.edit', compact('langs', 'answer', 'medicines', 'packages', 'types', 'tests'));
    }

    public function update($id, AnswerUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        if ($data['type'] == AnswerTypeEnum::MEDICINE) {
            unset($data['package_id']); 
        } else if ($data['type'] == AnswerTypeEnum::PACKAGE) {
            unset($data['medicine_id']); 
        }
        return $this->service->edit($id, $data, true)->redirect('admin.answer.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.answer.index');
    }
}
