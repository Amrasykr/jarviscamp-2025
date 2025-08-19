<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // define item attributes and value with faker
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
