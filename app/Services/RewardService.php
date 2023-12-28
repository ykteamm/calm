<?php

namespace App\Services;

use App\Models\Reward;
use App\Services\BaseService;
use App\Http\Resources\RewardResource;
use App\Traits\MakeAsset;
use Carbon\Carbon;

class RewardService extends BaseService
{
    use MakeAsset;
    public function __construct(Reward $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = RewardResource::class;

        $this->likableFields = [
            'name',
        ];

        $this->equalableFields = [
            'id',
            'created_by',
            'updated_by',
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

    public function saveRewards($data)
    {
        try {

            foreach ($data['rewards'] as $key => $aim) {
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
                    $this->setQuery();
                    $this->query->where('id', $aim['id'])->update([
                        'done' => 1
                    ]);
                }
            }
            return back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }

    public function weekRewards()
    {
        $this->setQuery();
        $start = Carbon::now()->startOfWeek()->format("Y-m-d");
        $end = Carbon::now()->endOfWeek()->format("Y-m-d");
        $rewards = $this->query
            ->whereBetween('created_at', [$start, $end])
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->with('images')
            ->limit(3)
            ->get();
        return $rewards;
    }
}
