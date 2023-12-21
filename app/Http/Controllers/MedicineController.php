<?php

namespace App\Http\Controllers;

use App\Services\MedicineService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineUpsertRequest;
use App\Services\LanguageService;

class MedicineController extends Controller
{
    protected LanguageService $languageService;
    protected MedicineService $service;
    public function __construct(
        MedicineService $service,
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
        $medicine = $this->service->getList($indexRequest);
        return view('admin.medicine.index', compact('medicine'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.medicine.create', compact('langs'));
    }

    public function store(MedicineUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.medicine.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => []
        ];
        $medicine = $this->service->show($id);
        return view('admin.medicine.show', compact('medicine'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $medicine = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.medicine.edit', compact('langs', 'medicine'));
    }

    public function update($id, MedicineUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.medicine.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.medicine.index');
    }
}
