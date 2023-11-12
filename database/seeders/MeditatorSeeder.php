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
        for ($i=1; $i < 11; $i++) { 
            $m = Meditator::create([
                'firstname' => "User $i",
                'lastname' => "Family $i"
            ]);
           $m->avatar()->create([
                'name' => "avatar$i",
                'extension' => 'jpeg',
                'folder' => 'images'
           ]);
           $m->image()->create([
                'name' => "img$i",
                'extension' => 'jpeg',
                'folder' => 'images'
            ]);
        }
    }
}
