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
        return [
            'user_id' => User::factory(),
            'day_of_week' => 5,
            'start_time' => '18:00:00',
            'end_time' => '22:00:00',
            'is_open' => $this->faker->boolean(10),
        ];
    }
}
