<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointments\Models\AppointmentSetting;

class AppointmentSettingSeeder extends Seeder
{
    public function run(): void
    {
        AppointmentSetting::factory()->create();
    }
}
