<?php

declare(strict_types=1);

namespace Modules\Customers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerNote;
use Modules\Customers\Models\CustomerTopic;

class CustomerNoteFactory extends Factory
{
    /**
     * Passing the Customer model to CustomerFactory find from Modules
     */
    protected $model = CustomerNote::class;

    public function definition(): array
    {
        $started = fake()->dateTimeBetween('-1 years', 'now');
        return [
            'customer_id' => Customer::factory(),
            'customer_topic_id' => CustomerTopic::factory(),
            'content' => fake()->paragraphs(3, true),
            'homework' => fake()->sentence(),
            'summary' => fake()->realText(50),
            'intensity_scale' => fake()->numberBetween(1, 10),
            'started_at' => $started,
            'improved_at' => fake()->optional()->dateTimeBetween($started, 'now'),
            'status' => fake()->randomElement(['ongoing', 'improved', 'stopped', 'unimproved']),
        ];
    }
}
