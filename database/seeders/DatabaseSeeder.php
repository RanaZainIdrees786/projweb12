<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(count: 10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        $data = [
            ['name' => 'mobile', 'price' => 1000, 'description' => 'mobile description'],
            ['name' => 'laptop', 'price' => 2000, 'description' => 'laptop description'],
            ['name' => 'tablet', 'price' => 3000, 'description' => 'tablet description'],
            ['name' => 'desktop', 'price' => 4000, 'description' => 'desktop description'],
            ['name' => 'watch', 'price' => 5000, 'description' => 'watch description'],
            ['name' => 'tv', 'price' => 6000, 'description' => 'tv description'],
            ['name' => 'camera', 'price' => 7000, 'description' => 'camera description'],
            ['name' => 'printer', 'price' => 8000, 'description' => 'printer description'],
            ['name' => 'headphone', 'price' => 9000, 'description' => 'headphone description'],
            ['name' => 'speaker', 'price' => 10000, 'description' => 'speaker description']
        ];

        foreach ($data as $e) {
            # code...
            $product = new Product();
            $product->name = $e['name'];
            $product->price = $e['price'];
            $product->description = $e['description'];
            $product->save();
        }

    }
}
