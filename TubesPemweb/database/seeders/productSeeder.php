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
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            $categoryId = rand(1, 6);

            Product::create([
                'category_id' => $categoryId,
                'product_name' => ucfirst($faker->word),
                'stock' => $faker->randomNumber(2),
                'color' => $faker->colorName,
                'price' => $faker->numberBetween(110000, 2000000),
                'description' => $faker->sentence,
                'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
            ]);
        }
    }
}
