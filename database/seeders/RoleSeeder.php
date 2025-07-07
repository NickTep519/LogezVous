<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        Role::firstOrCreate(['name' => 'super-admin']);

        // Admin
        Role::firstOrCreate(['name' => 'admin']);

        // Agence Immobilière
        Role::firstOrCreate(['name' => 'agence']);

        // Démarcheur
        Role::firstOrCreate(['name' => 'demarcheur']);

        // Client / Visiteur
        Role::firstOrCreate(['name' => 'client']);
    }
}
