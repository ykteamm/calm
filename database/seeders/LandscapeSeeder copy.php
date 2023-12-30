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

        for ($i=0; $i < 3; $i++) {
            $landscape = Landscape::create(['name' => 'Landscape ' . ($i + 1)]);
            $landscape->video()->create([
                'path' => 'calm/media/olov_2.mp4',
                'info' => '[]',
                'type' => Landscape::VIDEO
            ]);
            // $landscape->audio()->create([
            //     'path' => 'calm/media/test.mp3',
            //     'info' => '[]',
            //     'type' => Landscape::AUDIO
            // ]);
            // $landscape->image()->create([
            //     'path' => 'calm/2.jpg',
            //     'info' => '[]',
            //     'type' => Landscape::IMAGE
            // ]);
        }
    }
}
