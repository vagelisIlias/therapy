<?php

declare(strict_types=1);

namespace Modules\Customers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Modules\Customers\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * Passing the Customer model to CustomerFactory find from Modules
     */
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => 'customer',
            'avatar' => null,
            'phone' => fake()->unique()->phoneNumber(),
            'total_bookings' => fake()->numberBetween(1, 50),
            'total_completed' => fake()->numberBetween(1, 40),
            'total_cancelled' => fake()->numberBetween(1, 10),
        ];
    }
}
