<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'pseudo_or_agency' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'city' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'), // mot de passe par défaut
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {
    //         if (! $user->hasAnyRole(['super-admin', 'admin', 'agency_manager', 'agent', 'demarcheur', 'proprietaire', 'locataire'])) {
    //             $user->assignRole('locataire');
    //         }
    //     });
    // }
}
