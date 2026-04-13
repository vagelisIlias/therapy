<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Factories;

use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Users\Database\Models\User;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    /**
     * @throws DateMalformedStringException
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $duration = 60;
        $end = (clone $start)->modify("+ {$duration} minutes");

        return [
            'appointment_uuid' => Str::uuid(),
            'user_id' => User::factory(),
            'start_time' => $start,
            'end_time' => $end,
            'duration' => $duration,
            'status' => $this->faker->randomElement(['booked','cancelled','completed']),
        ];
    }
}
