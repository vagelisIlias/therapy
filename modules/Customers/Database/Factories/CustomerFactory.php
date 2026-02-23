<?php

declare(strict_types=1);

namespace Modules\Customers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'date_of_birth' => fake()->date('Y-m-d', '-18 years'),
            'phone' => fake()->unique()->phoneNumber(),
            'total_bookings' => fake()->numberBetween(1, 50),
            'total_completed' => fake()->numberBetween(1, 40),
            'total_cancelled' => fake()->numberBetween(1, 10),
        ];
    }
}
