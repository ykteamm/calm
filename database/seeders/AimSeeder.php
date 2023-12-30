<?php

namespace Database\Seeders;

use App\Models\Aim;
use Illuminate\Database\Seeder;

class AimSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            "Bir kunda 5 soat uxlash",
            "10 000 qaram piyoda bosib otish",
            "Bir hafta shakar yemaslik",
            "Qarindoshlar holidan habar olish",
            "Ishga ertaroq borish",
            "Yigirmata yangi lug'at yod olish",
            "Qiynalganlarga yordam berish",
            "Qaysidir kun telefondan maksimum 3 soatdan ziyod foydalanmaslik",
            "Fast foodlardan iloji boricha yiroqlashish",
            "Muntazam jismoniy mashqlar bilan shug'ullanish"
        ];
        for ($i=0; $i < 10; $i++) { 
            Aim::create([
                'user_id' => 1,
                'text' => $texts[$i]
            ]);
        }
    }
}
