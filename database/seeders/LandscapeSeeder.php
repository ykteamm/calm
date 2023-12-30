<?php

namespace Database\Seeders;

use App\Models\Landscape;
use App\Models\Meditator;
use Illuminate\Database\Seeder;

class LandscapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $name

        // for ($i=0; $i < 3; $i++) {
            $landscape = Landscape::create(['name' => 'Olov']);
            $landscape->video()->create([
                'path' => 'calm/media/olov.mp4',
                'info' => '[]',
                'type' => Landscape::VIDEO
            ]);
            $landscape->audio()->create([
                'path' => 'calm/media/olov1.mp3',
                'info' => '[]',
                'type' => Landscape::AUDIO
            ]);
            $landscape->image()->create([
                'path' => 'calm/2.jpg',
                'info' => '[]',
                'type' => Landscape::IMAGE
            ]);


            $landscape = Landscape::create(['name' => 'O\'rmonda yomg\'ir']);
            $landscape->video()->create([
                'path' => 'calm/media/yom-mon.mp4',
                'info' => '[]',
                'type' => Landscape::VIDEO
            ]);
            $landscape->audio()->create([
                'path' => 'calm/media/olovo1.mp3',
                'info' => '[]',
                'type' => Landscape::AUDIO
            ]);
            $landscape->image()->create([
                'path' => 'calm/2.jpg',
                'info' => '[]',
                'type' => Landscape::IMAGE
            ]);
            $landscape = Landscape::create(['name' => 'Yomg\'irli momaqaldiroq']);
            $landscape->video()->create([
                'path' => 'calm/media/yom-chaqmoq.mp4',
                'info' => '[]',
                'type' => Landscape::VIDEO
            ]);
            $landscape->audio()->create([
                'path' => 'calm/media/yomch1.mp3',
                'info' => '[]',
                'type' => Landscape::AUDIO
            ]);
            $landscape->image()->create([
                'path' => 'calm/2.jpg',
                'info' => '[]',
                'type' => Landscape::IMAGE
            ]);
        // }
    }
}
