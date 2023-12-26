<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\PackageUpsertRequest;
use App\Services\LanguageService;
use App\Services\MedicineService;
use App\Services\TestService;

class PackageController extends Controller
{
    protected LanguageService $languageService;
    protected MedicineService $medicineService;
    protected TestService $testService;
    protected PackageService $service;
    public function __construct(
        PackageService $service,
        LanguageService $languageService,
        MedicineService $medicineService,
        TestService $testService
        )
    {
        $this->languageService = $languageService;
        $this->medicineService = $medicineService;
        $this->testService = $testService;
        $this->service = $service;
    }

    public function upload(AssetRequest $assetRequest, $package)
    {
        return $this->service->storeAsset($package, $assetRequest->validated(), true)
            ->redirect('admin.package.index');
    }

    public function reupload(AssetRequest $assetRequest, $asset, $package)
    {
        return $this->service->updateAsset($package, $asset, $assetRequest->validated(), true)
            ->redirect('admin.package.index');
    }

    public function unupload($asset, $package)
    {
        return $this->service->deleteAsset($package, $asset, true)
            ->redirect('admin.package.index');
    }
    
    public function image($package)
    {
        $this->service->willParseToRelation = ['image'];
        $package = $this->service->show($package);
        return view('admin.package.image', compact('package'));
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
        $packages = $this->service->getList([]);
        $medicines = $this->medicineService->with(['translation'])->getList([]);
        $langs = $this->languageService->getList([]);
        return view('admin.package.create', compact('langs', 'medicines', 'packages'));
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
            'translation',
            'tests' => ['test' => ['translation' => []]],
            'medicines' => ['translation' => []]
        ];
        $package = $this->service->show($id);
        return view('admin.package.show', compact('package'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = [
            'translations',
            'tests' => ['test' => ['translation' => []]]
        ];
        $package = $this->service->show($id);

        $this->testService->queryClosure = fn ($q) => $q->whereNotIn('id', $package->tests->pluck('id')->toArray());
        $tests = $this->testService->with(['translation'])->getList([]);
        $langs = $this->languageService->getList([]);
        $this->medicineService->queryClosure = fn ($q) => $q->whereNotIn('id', $package->medicines->pluck('id')->toArray());
        $medicines = $this->medicineService->with(['translation'])->getList([]);
        
        return view('admin.package.edit', compact('langs', 'package', 'medicines', 'tests'));
    }

    public function update($id, PackageUpsertRequest $upsertRequest)
    {
        return $this->service->fullUpdate($upsertRequest->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.package.index');
    }
}
