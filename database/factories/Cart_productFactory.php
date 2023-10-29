<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Cart_productFactory extends Factory
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
            'cart_id' => Cart::inRandomOrder()->first()->id,
'product_id'=> Product::inRandomOrder()->first()->id,
'quantity'=>fake()->numberBetween(1,10),
'price'=>fake()->numberBetween(100,9000),
        ];
    }
}
