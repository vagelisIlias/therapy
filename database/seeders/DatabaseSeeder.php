<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Appointments\Database\Models\AppointmentSetting;
use Modules\Appointments\Database\Models\WorkingHour;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Database\Models\AvailableSlots;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        $user = User::first();

        AppointmentSetting::factory()->for($user)->create();
        WorkingHour::factory()->for($user)->create();
        AvailableSlots::factory()->for($user)->create();
        Appointment::factory(20)->for($user)->create();
    }
}
