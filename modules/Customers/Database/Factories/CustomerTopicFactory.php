<?php

declare(strict_types=1);

namespace Modules\Customers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerTopic;

class CustomerTopicFactory extends Factory
{
    /**
     * Passing the Customer model to CustomerFactory find from Modules
     */
    protected $model = CustomerTopic::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'customer_id' => Customer::factory(),
            'description' => fake()->paragraph(),

        ];
    }
}
