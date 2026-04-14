<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointments\Database\Models\WorkingSchedule;

class WorkingScheduleSeeder extends Seeder
{
    public function run(): void
    {
        WorkingSchedule::factory()->create();
    }
}
