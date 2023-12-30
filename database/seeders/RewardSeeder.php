<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            "Bir kunda 5 soat uxlash BAJARDIM ENDI DAM OLAMAN",
            "10 000 qaram piyoda bosib otish BAJARDIM ENDI DAM OLAMAN",
            "Bir hafta shakar yemaslik BAJARDIM ENDI DAM OLAMAN",
            "Qarindoshlar holidan habar olish BAJARDIM ENDI DAM OLAMAN",
            "Ishga ertaroq borish BAJARDIM ENDI DAM OLAMAN",
            "Yigirmata yangi lug'at yod olish BAJARDIM ENDI DAM OLAMAN",
            "Qiynalganlarga yordam berish BAJARDIM ENDI DAM OLAMAN",
            "Qaysidir kun telefondan maksimum 3 soatdan ziyod foydalanmaslik BAJARDIM ENDI DAM OLAMAN",
            "Fast foodlardan iloji boricha yiroqlashish BAJARDIM ENDI DAM OLAMAN",
            "Muntazam jismoniy mashqlar bilan shug'ullanish"
        ];
        for ($i=0; $i < 10; $i++) { 
            Reward::create([
                'user_id' => 1,
                'text' => $texts[$i]
            ]);
        }
    }
}
