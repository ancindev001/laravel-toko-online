<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(50),
            'stock' => fake()->randomNumber(2, true),
            'description' => fake()->text(),
            'price' => fake()->randomNumber(5, true),
            'photo' => fake()->imageUrl(640, 480, 'animals', true)
        ];
    }
}
