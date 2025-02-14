<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => $this->faker->word(),
            'content' => $this->faker->sentence(),
            'locale' => $this->faker->randomElement(['en', 'fr', 'es']),
            'tags' => json_encode($this->faker->randomElements(['mobile', 'desktop', 'web'], rand(1, 2))),
        ];
    }
}
