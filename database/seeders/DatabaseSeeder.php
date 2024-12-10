<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        
        $adminRole = Role::where('role_name', 'admin')->first();
        $kasirRole = Role::where('role_name', 'kasir')->first();

        $user1 = User::create([
            'name' => 'Kakak Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('pastibisa23'),
            'role_id' => $adminRole->id,
        ]);

        $user2 = User::create([
            'name' => 'Kakak Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('semogabisa'),
            'role_id' => $kasirRole->id,
        ]);
    }
}