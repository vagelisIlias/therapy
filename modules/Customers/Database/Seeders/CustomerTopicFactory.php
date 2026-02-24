<?php

namespace Modules\Customers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Customers\Models\CustomerTopic;

class CustomerTopicFactory extends Seeder
{
    public function run(): void
    {
        CustomerTopic::factory()->create();
    }
}
