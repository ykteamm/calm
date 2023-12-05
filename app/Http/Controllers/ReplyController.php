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

    public function Createreply(Request $request){
        $request->validate([
            'user_id'=>'required',
            'gratitude_id'=>'required',
            'titles' => 'required|array|min:3',
            'titles.*' => 'required',
        ]);

        $texts  = $request->titles;
        foreach ($texts as $text) {
            $data = new Reply();
            $data->user_id = $request->user_id;
            $data->gratitude_id = $request->gratitude_id;
            $data->text = $text;
            $data->save();
        }
        if ($data->save()){
            return redirect(url('/'))->with('success','Success');
        }else{
            abort(404);
//            return redirect(route('user_profile'))->with('error','Your Education created error!');
        }
//       dd($data);

    }
}
