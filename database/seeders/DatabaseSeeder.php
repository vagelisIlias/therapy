<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Appointments\Models\Appointment;
use Modules\Appointments\Models\AppointmentSetting;
use Modules\Appointments\Models\ClosedSlot;
use Modules\Appointments\Models\WorkingHour;
use Modules\Users\Database\Seeders\UserSeeder;
use Modules\Users\Models\User;

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
        ClosedSlot::factory()->for($user)->create();
        Appointment::factory(20)->for($user)->create();
    }
}
