<?php

namespace App\Http\Controllers;

use App\Services\RuleService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RuleUpsertRequest;
use App\Services\PackageService;

class RuleController extends Controller
{
    protected RuleService $service;
    protected PackageService $packageService;
    public function __construct(
        RuleService $service,
        PackageService $packageService)
    {
        $this->service = $service;
        $this->packageService = $packageService;
    }

    public function index(IndexRequest $indexRequest)
    {
        $rule = $this->service->with([
            'package' => ['translation' => []],
            'result' => ['translation' => []],
        ])->getList($indexRequest);
        return view('admin.rule.index', compact('rule'));
    }

    public function create()
    {
        $packages = $this->packageService->with(['translation'])->getList();
        return view('admin.rule.create', compact('packages'));
    }

    public function store(RuleUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.rule.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'package' => ['translation' => []],
            'result' => ['translation' => []],
        ];
        $rule = $this->service->show($id);
        return view('admin.rule.show', compact('rule'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = [
            'package' => ['translation' => []],
            'result' => ['translation' => []],
        ];
        $rule = $this->service->show($id);
        $packages = $this->packageService
            ->with(['translation'])
            ->except($rule->package_id)
            ->clearAfter()
            ->getList();
        $results = $this->packageService
            ->with(['translation'])
            ->except($rule->result_id)
            ->getList();
        return view('admin.rule.edit', compact('rule', 'packages', 'results'));
    }

    public function update($id, RuleUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.rule.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.rule.index');
    }
}
