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
            $table->string('code', 30);
            $table->string('name', 100)->nullable(false);
            $table->string('description', 1000)->nullable()->default(null);
            $table->integer('stock', false, true)->default(0)->nullable(false);
            $table->integer('price', false, true)->nullable(false);
            $table->integer('weight', false, true)->nullable(false);
            $table->string('product_image', 255)->nullable();
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('category_id')->constrained('categories');
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
