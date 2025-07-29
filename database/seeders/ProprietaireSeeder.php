<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProprietaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function ($proprietaire) {
            $proprietaire->assignRole('proprietaire');

            $locataires = User::factory()->count(11)->create()->each(function ($locataire) {
                $locataire->assignRole('locataire');
            });

            $properties = Property::factory()->count(15)->create([
                'user_id' => $proprietaire->id,
                'owner_id' => $proprietaire->id
            ]);

            Tenant::factory()->count(rand(10, 20))->create([
                'user_id' => $locataires->random()->id,
                'property_id' => $properties->random()->id,
                'mentor_id' => $proprietaire->id
            ])->each(function ($tenant) use ($proprietaire) {
                $lease = Lease::factory()->create([
                    'property_id' => $tenant->property_id,
                    'tenant_id' => $tenant->id,
                    'agent_id' => $proprietaire->id
                ]);

                Payment::factory()->count(10)->create([
                    'lease_id' => $lease->id,
                    'tenant_id' => $tenant->id,
                    'property_id' => $tenant->property_id
                ]);
            });
        });
    }
}
