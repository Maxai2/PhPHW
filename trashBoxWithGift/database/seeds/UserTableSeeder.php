<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => Hash::make("1234"),
            'phone' => "+9945112321"
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'client']);

        $admin->assignRole($adminRole);
    }
}
