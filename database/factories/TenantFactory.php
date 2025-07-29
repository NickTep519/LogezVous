<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agency;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tenant::class;

    public function definition(): array
    {
        return [
            // 'user_id' => User::factory(),
            // 'property_id' => Property::factory(),
            // 'agency_id' => Agency::factory(),
            // 'mentor_id' =>User::factory(),
        ];
    }
}
