<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemarcheurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->count(10)->create()->each(function ($demarcheur) {
            $demarcheur->assignRole('demarcheur');

            $owners = Owner::factory()->count(2)->create([
                    'mentor_id' => $demarcheur->id
            ]);

            Property::factory()->count(15)->create([
                'user_id' => $demarcheur->id,
                'owner_id' => $owners->random()->id
            ]);
        });
    }
}
