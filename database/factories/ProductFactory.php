<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            //
            'image' => fake()->imageUrl(),
            'stock' => fake()->numberBetween(1, 50),
            'price' => fake()->numberBetween(800, 8000),
            'discount' => fake()->numberBetween(1, 100),
            'number_of_pages' => fake()->numberBetween(100, 900),
            'code' => Str::random(10),
            'price_after_discount' => fake()->numberBetween(800, 8000),
            'status' => 'pending',
            'name' => fake()->name(),
            'description' => fake()->paragraph(1),
            'author' => fake()->name(),
            'bestseller' => fake()->numberBetween(1, 10),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
