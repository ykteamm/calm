<?php

namespace Database\Seeders;

use App\Models\Meditator;
use Illuminate\Database\Seeder;

class MeditatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditators = [
            [
                'firstname' => "Ahad",
                'lastname' => "Xudoyorov",
                'avatar' => 'meditators/ahad.jpeg',
                'image' => 'meditators/ahad.jpeg'
            ],
             [
                 'firstname' => "Zulfiqor",
                 'lastname' => "Abdurahmonov",
                 'avatar' => 'meditators/zulfiqor.png',
                 'image' => 'meditators/zulfiqor.png'
             ],
             [
                 'firstname' => "Dilya",
                 'lastname' => "Asliddinova",
                 'avatar' => 'meditators/dilya.png',
                 'image' => 'meditators/dilya.png'
             ],
            // [
            //     'firstname' => "Jack",
            //     'lastname' => "Ma",
            //     'avatar' => 'meditators/jack-avatar.jpg',
            //     'image' => 'meditators/jack-image.webp'
            // ],
            // [
            //     'firstname' => "Elon",
            //     'lastname' => "Musk",
            //     'avatar' => 'meditators/elon-avatar.jpg',
            //     'image' => 'meditators/elon-image.jpg'
            // ],
        ];

        foreach ($meditators as $m) {
            $meditator = Meditator::create([
                'firstname' => $m['firstname'],
                'lastname' => $m['lastname'],
            ]);
            $meditator->avatar()->create([
                'path' => $m['avatar'],
                'info' => '[]',
                'type' => Meditator::AVATAR
            ]);
            $meditator->image()->create([
                'path' => $m['image'],
                'info' => '[]',
                'type' => Meditator::IMAGE
            ]);
        }
    }
}
