<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointments\Models\ClosedSlot;

class ClosedSlotSeeder extends Seeder
{
    public function run(): void
    {
        ClosedSlot::factory()->create();
    }
}
