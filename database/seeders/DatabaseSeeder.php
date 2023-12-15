<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            CategorySeeder::class,
            IssueSeeder::class,
            QuestionSeeder::class,
            VariantSeeder::class,
            EmojiSeeder::class,
            MeditatorSeeder::class,
            MeditationSeeder::class,
            GratitudeSeeder::class,
            MotivationSeeder::class
        ]);
    }
}
