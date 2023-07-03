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
        // if (!Schema::hasTable('users')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                // $table->unsignedBigInteger('category_id');
                // $table->unsignedBigInteger('inventory_id');
                // $table->unsignedBigInteger('discount_id');
                $table->foreignId('category_id')->constrained('categories');
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('discount_id')->constrained('discount');
                $table->double('rating')->nullable();
                $table->integer('quantity');
                $table->string('name');
                $table->double('price');
                $table->text('description');
                $table->string('image');
                $table->string('sku');

                // $table->foreign('category_id')->references('id')->on('category');
                // $table->foreign('inventory_id')->references('id')->on('inventory');
                // $table->foreign('discount_id')->references('id')->on('discount');

                $table->timestamps();
            });
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};