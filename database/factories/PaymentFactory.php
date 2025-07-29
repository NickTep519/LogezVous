<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class ;

    public function definition(): array
    {
        return [
            // 'tenant_id' => Tenant::factory(),
            // 'property_id' => Property::factory(),
            'amount' => $this->faker->numberBetween(20000, 500000),
            'year' => $this->faker->dateTimeBetween('-3 years', 'now')->format('Y'),
            'month' => $this->faker->numberBetween(1, 12),
            'paid_at' => now(),
            'payment_method' => $this->faker->randomElement(['Momo', 'Carte', 'Espece'])
        ];
    }
}
