<?php

namespace Modules\Customers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Customers\Models\CustomerNote;

class CustomerNoteSeeder extends Seeder
{
    public function run(): void
    {
        CustomerNote::factory()->count(20)->create();
    }
}
