<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Shipper;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('order_details')->truncate();
        DB::table('orders')->truncate();
        DB::table('products')->truncate();
        DB::table('shippers')->truncate();
        DB::table('suppliers')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);
        Category::factory(5)->create();
        Supplier::factory(5)->create();
        Shipper::factory(5)->create();
        Product::factory(20)->create();
        Order::factory(100)->create();
        OrderDetail::factory(300)->create();
    }
}
