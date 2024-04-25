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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('buyer_name');
            $table->dateTime('order_date');
            $table->dateTime('required_date');
            $table->dateTime('shipped_date');

            $table->string('shipping_name');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shipper_name');

            $table->string('comments')->nullable();
            $table->enum('status', ['Shipped', 'Delivered', 'Cancelled', 'On Hold', 'Disputed']);

            $table->integer('total_quantity');
            $table->integer('total_weight');
            $table->float('total_product_amount');
            $table->float('total_shipping_cost');
            $table->float('total_shopping_amount');
            $table->float('service_charge');
            $table->float('total_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
