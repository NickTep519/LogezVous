<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = User::factory()->create([
            'email' => 'superadmin@exemple.com'
        ]);

        $super_admin->assignRole('super-admin');

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');
    }
}
