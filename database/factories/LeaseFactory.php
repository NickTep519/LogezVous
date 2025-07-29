<?php

namespace Database\Factories;

use App\Models\Lease;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lease>
 */
class LeaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lease::class;

    public function definition(): array
    {
        return [
            // 'property_id' => Property::factory(),
            // 'tenant_id' => Tenant::factory(),
            'start_date' => now(),
            'end_date' => $this->faker->dateTimeBetween('now', '+30 years'),
            'rent_amount' => $this->faker->numberBetween(20000, 500000),
            'status' => $this->faker->randomElement(['active', 'terminated']),
        ];
    }
}
