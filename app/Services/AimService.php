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

    public function saveAims(array $data)
    {
        try {
            foreach ($data['aims'] as $aim) {
                // Tekshirish: text va id mavjudligi
                if (isset($aim['text']) && !isset($aim['id'])) {
                    // Oldingi elementni tahrirlash
                    if (isset($aim['old'])) {
                        $this->edit($aim['old'], ['text' => $aim['text']]);
                    } else {
                        // Yangi ma'lumot yaratish
                        $item = [
                            'text' => $aim['text'],
                            'user_id' => getProp(auth()->user(), 'id'),
                            'type' => 2
                        ];
                        $this->create($item);
                    }
                } elseif (isset($aim['text']) && isset($aim['id'])) {
                    // Ma'lumotni yangilash va mukofot xabari
                    $this->edit($aim['id'], [
                        'done' => 1,
                        'text' => $aim['text']
                    ]);
                    Session::flash('aimdone', "Mukofotlaringizni oling !");
                } elseif (!isset($aim['text']) && isset($aim['id'])) {
                    // Faqat "done" maydonini yangilash
                    $this->edit($aim['id'], ['done' => 1]);
                    Session::flash('aimdone', "Mukofotlaringizni oling !");
                }
            }
            return back();
        } catch (\Throwable $th) {
            // To'g'ridan-to'g'ri xatolikni foydalanuvchiga qaytarmaslik uchun loglash
            \Log::error('Error saving aims: ' . $th->getMessage());
            return back()->with('error', 'Aim maʼlumotlarini saqlashda xatolik yuz berdi.');
        }
    }


    public function weekAims()
    {
        $this->setQuery();
        $start = Carbon::now()->startOfWeek()->format("Y-m-d");
//        return $start;
        $end = Carbon::now()->endOfWeek()->format("Y-m-d");
//        return[
//            'start'=>$start,
//            'end'=>$end
//        ];
        $aims = $this->query
            ->whereBetween('created_at', [$start, $end])
            ->where('user_id', getProp(auth()->user(), 'id'))
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
            ->where('user_id', getProp(auth()->user(), 'id'))
            ->where('done', 1)
            ->exists();
    }
}
