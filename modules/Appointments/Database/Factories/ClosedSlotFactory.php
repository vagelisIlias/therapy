<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointments\Models\ClosedSlot;

class ClosedSlotFactory extends Factory
{
    protected $model = ClosedSlot::class;

    /**
     * @throws \DateMalformedStringException
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $duration = $this->faker->numberBetween(30, 120);
        $end = (clone $start)->modify("+ {$duration} minutes");

        return [
            'start_time' => $start,
            'end_time' => $end,
            'reason' => $this->faker->sentence(),
        ];
    }
}
