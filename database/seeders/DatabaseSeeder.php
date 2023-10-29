<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banner;
use App\Models\Branche;
use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Faqs;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\order_product;
use App\Models\Product;
use App\Models\Slider;
// use App\Models\categoryModel;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\AssignOp\Concat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(40)->create();
        Category::factory(40)->create();
        Faqs::factory(40)->create();
        Branche::factory(3)->create();
        Slider::factory(2)->create();
        Banner::factory(2)->create();
        Newsletter::factory(40)->create();
        Contact::factory(40)->create();
        Product::factory(40)->create();
        Wishlist::factory(40)->create();
        Order::factory(40)->create();
        Cart::factory(40)->create();
        Cart_product::factory(40)->create();
        order_product::factory(40)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
