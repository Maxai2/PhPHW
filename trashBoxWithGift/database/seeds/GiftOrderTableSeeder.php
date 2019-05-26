<?php

use Illuminate\Database\Seeder;
use App\Models\GiftOrder;

class GiftOrderTableSeeder extends Seeder
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
            GiftOrder::create([
                'order_id' => $faker->numberBetween(1, 10),
                'gift_id' => $faker->numberBetween(1, 10),
                'quantity' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
