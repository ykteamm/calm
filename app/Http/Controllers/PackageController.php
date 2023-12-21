<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageUpsertRequest;
use App\Services\LanguageService;
use App\Services\MedicineService;

class PackageController extends Controller
{
    protected LanguageService $languageService;
    protected MedicineService $medicineService;
    protected PackageService $service;
    public function __construct(
        PackageService $service,
        LanguageService $languageService,
        MedicineService $medicineService
        )
    {
        $this->languageService = $languageService;
        $this->medicineService = $medicineService;
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 
            'translations' => []
        ];
        $package = $this->service->getList($indexRequest);
        return view('admin.package.index', compact('package'));
    }

    public function create()
    {
        $medicines = $this->medicineService->with(['translation'])->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.package.create', compact('langs', 'medicines'));
    }

    public function store(PackageUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        $medicines = popper($data, 'medicines');
        return $this->service
        ->onSuccess(function($package, $query) use ($medicines) {
            if($medicines) {
                $package->medicines()->attach($medicines);
            }
        })
        ->create($data, true)
        ->redirect('admin.package.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => [], 'translations' => []
        ];
        $package = $this->service->show($id);
        return view('admin.package.show', compact('package'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $package = $this->service->withRelation(['medicines' => ['translation' => []]])->show($id);
        $langs = $this->languageService->getList([]);
        $this->medicineService->queryClosure = fn ($q) => $q->whereNotIn('id', $package->medicines->pluck('id')->toArray());
        $medicines = $this->medicineService->with(['translation'])->getList([]);
        return view('admin.package.edit', compact('langs', 'package', 'medicines'));
    }

    public function update($id, PackageUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        $old = popper($data, 'medicines_old');
        $new = popper($data, 'medicines_new');
        return $this->service
            ->onSuccess(function($package, $query) use ($old, $new) {
                if($old) {
                    $package->medicines()->detach($old);
                }
                if($new) {
                    $package->medicines()->attach($new);
                }
            })
            ->edit($id, $data, true)
            ->redirect('admin.package.index');
    }



    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.package.index');
    }
}
