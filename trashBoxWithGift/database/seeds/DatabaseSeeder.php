<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GiftTableSeeder::class);
        $this->call(TrashTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(GiftOrderTableSeeder::class);
    }
}
