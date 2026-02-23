<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointments\Models\WorkingHour;

class WorkingHourSeeder extends Seeder
{
    public function run(): void
    {
        WorkingHour::factory()->count(20)->create();
    }
}
