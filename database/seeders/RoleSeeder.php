<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Masukkan data ke tabel roles
        Role::updateOrCreate(['role_name' => 'admin'], ['role_name' => 'admin']);
        Role::updateOrCreate(['role_name' => 'kasir'], ['role_name' => 'kasir']);
    }
}