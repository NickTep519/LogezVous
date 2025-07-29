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

        // Chef d'agence
        Role::firstOrCreate(['name' => 'agency_manager']);

        // Agent Immobilier
        Role::firstOrCreate(['name' => 'agent']);

        // Démarcheur
        Role::firstOrCreate(['name' => 'demarcheur']);

        // Propriétaire
        Role::firstOrCreate(['name' => 'proprietaire']) ;


        // Locataire
        Role::firstOrCreate(['name' => 'locataire']);

        // Client (Potentiel locataire)
        Role::firstOrCreate(['name' => 'client']) ; ;


    }
}
