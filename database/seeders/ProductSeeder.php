<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::insert([
        //     'name' => 'Iphone 14',
        //     'price' => 100000,
        //     'description' => Str::random(100),
        //     'image' => 'image.jpg',
        // ]);

        Product::factory(10)->create();
    }
}
