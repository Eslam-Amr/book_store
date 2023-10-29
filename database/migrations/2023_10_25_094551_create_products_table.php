<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('stock');
            $table->float('price');
            $table->float('discount');
            $table->float('number_of_pages');
            $table->string('code');
            $table->float('price_after_discount');
            $table->string('status');
            $table->string('name');
            $table->string('description');
            $table->string('author');
            $table->string('bestseller');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
