<?php

namespace Modules\Appointments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointments\Models\AppointmentSetting;

class AppointmentSettingFactory extends Factory
{
    protected $model = AppointmentSetting::class;

    public function definition(): array
    {
        return [
            'session_duration' => $this->faker->randomElement([30, 60, 90]),
            'slot_interval' => 5,
        ];
    }
}
