<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);


        $role = Role::where('name', 'admin')->first();
        $user->roles()->attach($role);

        $user2 = User::create([
            'name' => 'judge',
            'email' => 'judge@example.com',
            'password' => bcrypt('password'),
        ]);

        $role2 = Role::where('name', 'judge')->first();
        $user2->roles()->attach($role2);
    }
}
