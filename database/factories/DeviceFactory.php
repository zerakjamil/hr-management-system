<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => fake()->randomElement(Branch::all()),
            'status' => 'default-' . fake()->randomNumber(5),
            'box_number' => fake()->randomNumber(5),
            'mac_address' => fake()->macAddress,
            'serial_number' => fake()->randomNumber(5),
            'registered_date' => today(),
            'sold_date' => null,
        ];
    }
}
