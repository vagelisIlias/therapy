<?php

declare(strict_types=1);

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Database\Models\UserProvider;

class UserProviderSeeder extends Seeder
{
    public function run(): void
    {
        UserProvider::factory()->create();
    }
}
