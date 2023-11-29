<?php

namespace App\Http\Controllers;

use App\Services\ReplyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyUpsertRequest;

class ReplyController extends Controller
{
    protected ReplyService $service;
    public function __construct(ReplyService $service)
    {
        $this->service = $service;
    }

    public function store(ReplyUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        $data['user_id'] = auth()->id();
        $data = $this->service->create($data);
        return $data;
    }
}
