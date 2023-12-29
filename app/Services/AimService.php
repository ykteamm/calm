<?php

namespace App\Services;

use App\Models\Aim;
use App\Services\BaseService;
use App\Http\Resources\AimResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AimService extends BaseService
{
    public function __construct(Aim $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = AimResource::class;

        $this->likableFields = [
            'text',
        ];

        $this->equalableFields = [
            'id',
            'user_id'
        ];

        parent::__construct();
    }

    public function randomly($count)
    {
        $this->setQuery();
        return $this->query->where('type', 1)->inRandomOrder()->limit(3)->get();
    }

    public function randomOne($items)
    {
        $this->setQuery();
        return $this->query->where('type', 1)->whereNotIn('id', $items)->inRandomOrder()->first();
    }

    public function saveAims($data)
    {
        try {
            // dd($data['aims'][0]);
            foreach ($data['aims'] as $key => $aim) {
                if(isset($aim['text']) && !isset($aim['id'])) {
                    if (isset($aim['old'])) {
                        $this->edit($aim['old'], [
                            'text' => $aim['text']
                        ]);
                    } else {
                        $item = [
                            'text' => $aim['text'],
                            'user_id' => auth()->user()->id,
                            'type' => 2
                        ];
                        $this->create($item);
                    }
                } else if (isset($aim['text']) && isset($aim['id'])) {
                    $this->edit($aim['id'], [
                        'done' => 1,
                        'text' => $aim['text']
                    ]);
                    Session::flash('aimdone', "Mukofotlaringizni oling !");
                } else if (!isset($aim['text']) && isset($aim['id'])) {
                    $this->edit($aim['id'], [
                        'done' => 1
                    ]);
                    Session::flash('aimdone', "Mukofotlaringizni oling !");
                }
            }
            return back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }

    public function weekAims()
    {
        $this->setQuery();
        $start = Carbon::now()->startOfWeek()->format("Y-m-d");
        $end = Carbon::now()->endOfWeek()->format("Y-m-d");
        $aims = $this->query
            ->whereBetween('created_at', [$start, $end])
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        return $aims;
    }

    public function doneAims()
    {
        $this->setQuery();
        $start = Carbon::now()->startOfWeek()->format("Y-m-d");
        $end = Carbon::now()->endOfWeek()->format("Y-m-d");
        return $this->query
            ->whereBetween('created_at', [$start, $end])
            ->where('user_id', auth()->user()->id)
            ->where('done', 1)
            ->exists();
    }
}
