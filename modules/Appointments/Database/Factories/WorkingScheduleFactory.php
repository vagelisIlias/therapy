<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Users\Database\Models\User;

class WorkingScheduleFactory extends Factory
{
    protected $model = WorkingSchedule::class;

    public function definition(): array
    {
        $startHour = $this->faker->numberBetween(8, 18);
        $endHour = $startHour + $this->faker->numberBetween(5, 8);

        return [
            'user_id' => User::factory(),
            'day_of_week' => $this->faker->unique()->numberBetween(0,6),
            'start_time' => sprintf('%02d:00:00', $startHour),
            'end_time' => sprintf('%02d:00:00', $endHour),
            'is_open' => $this->faker->boolean(10),
        ];
    }
}
