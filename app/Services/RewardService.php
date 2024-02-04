<?php

namespace App\Services;

use App\Models\Reward;
use App\Services\BaseService;
use App\Http\Resources\RewardResource;
use App\Traits\MakeAsset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

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
        return $this->query->where('type', 1)->inRandomOrder()->limit(3)->get();
    }

    public function randomOne($items)
    {
        $this->setQuery();
        return $this->query->where('type', 1)->whereNotIn('id', $items)->inRandomOrder()->first();
    }

    public function saveRewards($data)
    {
        try {
            // dd($data);
            foreach ($data['rewards'] as $key => $reward) {
                if(isset($reward['text']) && !isset($reward['id'])) {
                    if (isset($reward['old'])) {
                        $this->edit($reward['old'], [
                            'text' => $reward['text'],
                            'feelings' => getProp($reward, 'feelings')
                        ]);
                    } else {
                        $item = [
                            'text' => $reward['text'],
                            'user_id' => getProp(auth()->user(), 'id'),
                            'type' => 2
                        ];
                        $this->create($item);
                    }
                } else if (isset($reward['text']) && isset($reward['id'])) {
                    $data = $this->edit($reward['id'], [
                        'done' => 1,
                        'text' => $reward['text'],
                        'feelings' => getProp($reward, 'feelings')
                    ]);
                    // dd("aaaa", ['d' => $data]);
                    Session::flash('rewarddone', "Mukofotlaringizni oling !");
                } else if (!isset($reward['text']) && isset($reward['id'])) {
                    $this->edit($reward['id'], [
                        'done' => 1,
                        'feelings' => getProp($reward, 'feelings')
                    ]);
                    Session::flash('rewarddone', "Mukofotlaringizni oling !");
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
            ->where('user_id', getProp(auth()->user(), 'id'))
            ->orderBy('id', 'desc')
            ->with('images')
            ->limit(3)
            ->get();
        return $rewards;
    }
}
