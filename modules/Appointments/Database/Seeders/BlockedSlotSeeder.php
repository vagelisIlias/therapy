<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointments\Models\BlockedSlot;

class BlockedSlotSeeder extends Seeder
{
    public function run(): void
    {
        BlockedSlot::factory()->count(20)->create();
    }
}
