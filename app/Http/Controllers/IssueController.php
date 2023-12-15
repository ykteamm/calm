<?php

namespace App\Http\Controllers;

use App\Services\IssueService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\IssueUpsertRequest;
use App\Services\LanguageService;

class IssueController extends Controller
{
    protected IssueService $service;
    protected LanguageService $languageService;
    public function __construct(
        IssueService $service,
        LanguageService $languageService
    )
    {
        $this->languageService = $languageService;
        $this->service = $service;
    }

    public function upload(AssetRequest $assetRequest, $issue)
    {
        return $this->service->storeAsset($issue, $assetRequest->validated(), true)
            ->redirect('admin.issue.index');
    }

    public function reupload(AssetRequest $assetRequest, $issue, $asset)
    {
        return $this->service->updateAsset($issue, $asset, $assetRequest->validated(), true)
            ->redirect('admin.issue.index');
    }

    public function unupload($issue, $asset)
    {
        return $this->service->deleteAsset($issue, $asset, true)
            ->redirect('admin.issue.index');
    }

    public function image($issue)
    {
        $this->service->willParseToRelation = ['image'];
        $issue = $this->service->show($issue);
        return view('admin.issue.image', compact('issue'));
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $issue = $this->service->getList($indexRequest);
        return view('admin.issue.index', compact('issue'));
    }

    public function create()
    {
        $langs = $this->languageService->getList([]);
        return view('admin.issue.create', compact('langs'));
    }

    public function store(IssueUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.issue.index');
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'translation' => ['object_id', 'name'], 'translations' => ['object_id', 'name']
        ];
        $issue = $this->service->show($id);
        return view('admin.issue.show', compact('issue'));
    }

    public function edit($id)
    {
        $this->service->willParseToRelation = ['translations'];
        $issue = $this->service->show($id);
        $langs = $this->languageService->getList([]);
        return view('admin.issue.edit', compact('langs', 'issue'));
    }

    public function update($id, IssueUpsertRequest $upsertRequest)
    {
        return $this->service->edit($id, $upsertRequest->validated(), true)->redirect('admin.issue.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.issue.index');
    }
}
