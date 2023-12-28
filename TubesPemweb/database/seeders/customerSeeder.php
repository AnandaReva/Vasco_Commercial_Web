<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a Faker instance
        $faker = Faker::create('id_ID'); // Menggunakan locale Indonesia

        // Generate 10 fake customers with Indonesian details
        for ($i = 0; $i < 10; $i++) {
            Customer::create([
                'customer_name' => $faker->name,
                'address' => $faker->address,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
