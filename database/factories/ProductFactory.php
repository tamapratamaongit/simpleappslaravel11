<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::inRandomOrder()->first(),
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'desc' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
