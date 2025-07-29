<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agency;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Property::class;


    public function definition(): array
    {
        $title = $this->faker->words(3, true);

        return [
            // 'agency_id' => Agency::factory(),
            // 'user_id' => User::factory(),
            'title' => ucfirst($title),
            'listing_type' => $this->faker->randomElement(['vente', 'location']),
            'property_type' => $this->faker->randomElement(['Apartment', 'House', 'Villa', 'Studio', 'Duplex', 'Penthouse', 'Plot', 'Magasin', 'Boutique', 'Bureaux', 'Terrain', 'Autre']),
            'price' => $this->faker->numberBetween(20000, 500000),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'rooms' => $this->faker->numberBetween(1, 8),
            'surface' => $this->faker->numberBetween(20, 500),
            'country' => 'Bénin',
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->streetName,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'cooling' => $this->faker->optional()->randomElement(['None', 'Window A/C', 'Split A/C', 'Central A/C', 'Autre']),
            'exterior_finish' => $this->faker->optional()->randomElement(['brique', 'crépi', 'pierre', 'bardage_bois', 'bardage_vinyle', 'carreaux', 'mixte', 'autre']),
            'year_built' => $this->faker->optional()->randomElement(['0-5', '0-10', '0-15', '15-20', '20+']),
            'status' => 'disponible',
            'garage' => $this->faker->boolean,
            'heating' => $this->faker->boolean,
            'fireplace' => $this->faker->boolean,
            'elevator' => $this->faker->boolean,
            'kitchen' => $this->faker->boolean,
            'smoking_allowed' => $this->faker->boolean,
            'parking' => $this->faker->boolean,
            'internet' => $this->faker->boolean,
            'wifi' => $this->faker->boolean,
            'bedding' => $this->faker->boolean,
            'balcony' => $this->faker->boolean,
            'terrace' => $this->faker->boolean,
            'swimming_pool' => $this->faker->boolean(30), // moins fréquent
            'published_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Property $property) {
            // Image principale
            // $property->addMedia(storage_path('app/fake/fake.jpg'))
            //     ->preservingOriginal()
            //     ->toMediaCollection('cover');

            // Galerie
            foreach (range(1, 3) as $i) {
                $property->addMedia(storage_path('app/faker/faker.jpg'))
                    ->preservingOriginal()
                    ->toMediaCollection('gallery');
            }
        });
    }
}
