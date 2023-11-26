<?php

namespace Database\Factories;

use App\Models\Motivation;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotivationTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'object_id' => $this->faker->randomElement(Motivation::all()->pluck('id')),
            'name' => $this->faker->word(),
            'language_code' => $this->faker->randomElement(Language::all()->pluck('code')),
        ];
    }
}
