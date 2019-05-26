<?php

use Illuminate\Database\Seeder;
use App\Models\TrashHistory;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class TrashTableSeeder extends Seeder
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
            TrashHistory::create([
                'priceByCoin' => $faker->numberBetween(1, 100),
                'geoLocation' => new Point(40.74894149554006, -73.98615270853043),
                'user_id' => $faker->numberBetween(2, 11)
            ]);
        }
    }
}
