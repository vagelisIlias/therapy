<?php

namespace Modules\Appointments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointments\Models\AppointmentSetting;
use Modules\Users\Models\User;

class AppointmentSettingFactory extends Factory
{
    protected $model = AppointmentSetting::class;

    public function definition(): array
    {
        return [
            'session_duration' => $this->faker->randomElement([30, 60, 90]),
            'break_between_sessions' => 5,
            'max_sessions_per_day' => 5,
        ];
    }
}
