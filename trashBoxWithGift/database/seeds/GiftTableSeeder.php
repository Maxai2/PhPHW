<?php

use Illuminate\Database\Seeder;
use App\Models\Gift;

class GiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Gift::create([
                'name' => substr($faker->sentence, 0, 10),
                'price' => $faker->numberBetween(10, 100),
                'description' => substr($faker->sentence, 0, 100),
                'count' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
