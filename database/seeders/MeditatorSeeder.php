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
                'firstname' => "Ergashev",
                'lastname' => "To'lqinbek",
                'avatar' => 'meditators/men.jpg',
                'image' => 'meditators/men.jpg'
            ],
            // [
            //     'firstname' => "Salimov",
            //     'lastname' => "Saidabror",
            //     'avatar' => 'meditators/lebron-avatar.jpg',
            //     'image' => 'meditators/lebron-image.jpeg'
            // ],
            // [
            //     'firstname' => "Andrew",
            //     'lastname' => "Tate",
            //     'avatar' => 'meditators/andrew-avatar.webp',
            //     'image' => 'meditators/andrew-image.webp'
            // ],
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
