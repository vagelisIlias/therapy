<?php

declare(strict_types=1);

namespace Modules\Customers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Customers\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::factory()->create();
    }
}
