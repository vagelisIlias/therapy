<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointments\Database\Models\AppointmentSetting;

class AppointmentSettingFactory extends Factory
{
    protected $model = AppointmentSetting::class;

    public function definition(): array
    {
        return [
            'session_duration' => 50,
            'break_between_sessions' => 10,
            'max_sessions_per_day' => 5,
        ];
    }
}
