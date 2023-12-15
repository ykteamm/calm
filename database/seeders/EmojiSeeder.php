<?php

namespace Database\Seeders;

use App\Models\Emoji;
use Illuminate\Database\Seeder;

class EmojiSeeder extends Seeder
{
    public function run()
    {
        $images = [
            [
                'label' => 'Angxious',
                'path' => 'emojies/anxi.svg'
            ],
            [
                'label' => 'Calm',
                'path' => 'emojies/calm.svg'
            ],
            [
                'label' => 'Panic',
                'path' => 'emojies/panic.svg'
            ],
            [
                'label' => 'Sad',
                'path' => 'emojies/sad.svg'
            ],
            [
                'label' => 'Tired',
                'path' => 'emojies/tired-face.svg'
            ],
            [
                'label' => 'Unsure',
                'path' => 'emojies/unsure.svg'
            ]
        ];
        foreach ($images as $image) {
            $emoji = Emoji::create([
                'text' => $image['label']
            ]);
            $emoji->image()->create([
                'path' => $image['path'],
                'info' => '[]'
            ]);
        }
    }
}
