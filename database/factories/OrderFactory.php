<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'notes' => fake()->paragraph(1),
            'governorate' => fake()->paragraph(1),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'status' => 'pending',
            'user_id' => User::inRandomOrder()->first()->id,
            'total' => fake()->numberBetween(50, 9000),
        ];
    }
}
