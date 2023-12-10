<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a Faker instance
        $faker = Faker::create();

        // Generate 10 fake products
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->productName,
                'description' => $faker->sentence,
                'price' => $faker->numberBetween(30000, 2000000),
                'stock' => $faker->numberBetween(0, 100),
                
            ]);
        }
    }
}
