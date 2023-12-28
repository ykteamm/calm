<?php

namespace App\Services;

use App\Models\Aim;
use App\Services\BaseService;
use App\Http\Resources\AimResource;
use Carbon\Carbon;

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
        return $this->query->inRandomOrder()->limit(3)->get();
    }

    public function randomOne($items)
    {
        $this->setQuery();
        return $this->query->whereNotIn('id', $items)->inRandomOrder()->first();
    }

    public function saveAims($data)
    {
        try {
            foreach ($data['aims'] as $key => $aim) {
                if(isset($aim['text'])) {
                    $item = [
                        'user_id' => auth()->user()->id,
                        'text' => $aim['text']
                    ];
                    if(isset($aim['id'])) {
                        $item['done'] = 1;
                    }
                    $this->create($item);
                } else if (isset($aim['id'])) {
                    $this->edit($aim['id'], ['done' => 1]);
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
}
