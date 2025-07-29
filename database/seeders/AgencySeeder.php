<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lease;
use App\Models\Agency;
use App\Models\Owner;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::factory()->count(10)->create()->each(function ($agency) {
            $manager = User::factory()->count(1)->create()->first();
            $manager->assignRole('agency_manager');
            $agency->manager()->associate($manager);
            $agency->save();
            $manager->agency()->associate($agency)->save();

            User::factory()->count(5)->create()->each(function ($agent) use ($agency) {
                $agent->assignRole('agent');
                $agent->agency()->associate($agency)->save();

                $clients = User::factory()->count(10)->create()->each(function($client){
                    $client->assignRole('client') ;
                }) ;

                $reviews = Review::factory()->count(10)->create([
                    'agent_id' => $agent->id,
                    'client_id' => $clients->random()->id,
                ]) ;

                $owners = Owner::factory()->count(3)->create([
                    'agency_id' => $agency->id,
                    'mentor_id' => $agent->id
                ]);

                $agent_properties = Property::factory()->count(20)->create([
                    'agency_id' => $agency->id,
                    'user_id' => $agent->id,
                    'owner_id' => $owners->random()->id
                ]);

                $locataires = User::factory()->count(20)->create()->each(function ($locataire) {
                    $locataire->assignRole('locataire');
                });

                Tenant::factory()->count(20)->create([
                    'user_id' => $locataires->random()->id,
                    'property_id' => $agent_properties->random()->id,
                    'agency_id' => $agency->id,
                    'mentor_id' => $agent->id
                ])->each(function ($tenant) use ($agent) {
                    $lease = Lease::factory()->create([
                        'property_id' => $tenant->property_id,
                        'tenant_id' => $tenant->id,
                        'agent_id' => $agent->id
                    ]);

                    Payment::factory()->count(10)->create([
                        'lease_id' => $lease->id,
                        'tenant_id' => $tenant->id,
                        'property_id' => $tenant->property_id
                    ]);
                });

            });
        });
    }
}
