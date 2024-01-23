<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Services\ReplyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyUpsertRequest;
use Illuminate\Http\Request;

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

    public function createReply(Request $request){
        $request->validate([
            'user_id'=>'required',
            'gratitude_id'=>'required',
            'titles' => 'required|array|min:1',
        ]);
        $texts = $request->titles;
        foreach ($texts as $text) {
            if ($text) {
                $this->service->create([
                   'user_id' => $request->user_id,
                   'gratitude_id' => $request->gratitude_id,
                   'text' => $text
                ]);
            }
        }
        return back();
    }
}
