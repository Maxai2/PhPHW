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

//<?php

// use Illuminate\Database\Seeder;
// use App\Models\User;
// use Spatie\Permission\Models\Role;

// class GiftTableSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         $admin = User::create([
//             'email' => 'admin@gmail.com',
//             'name' => 'admin',
//             'password' => Hash::make("1234"),
//             'phone' => "+9945112321"
//         ]);

//         $adminRole = Role::create(['name' => 'admin']);

//         $admin->assignRole($adminRole);

//         $faker = \Faker\Factory::create();
//         $clientRole = Role::create(['name' => 'client']);

//         for ($i = 0; $i < 10; $i++) {
//             $user = User::create([
//                 'name' => $faker->name,
//                 'email' => $faker->email,
//                 'password' => Hash::make($faker->password),
//                 'phone' => $faker->phoneNumber
//             ]);

//             $user->assignRole($clientRole);
//         }
//     }
// }

