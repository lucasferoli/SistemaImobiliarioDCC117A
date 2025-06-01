<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'description' => fake()->text(),
            'address' => fake()->unique()->address(),
            'image' => 'https://picsum.photos/id/' . fake()->unique()->numberBetween(1, 1000) . '/600/400',
            'buyPrice' => fake()->numberBetween(100000, 1000000),
            'rentPrice' => fake()->numberBetween(1000, 10000),
            'user_id' => User::inRandomOrder()->first()?->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
