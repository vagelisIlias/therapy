<?php

declare(strict_types=1);

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Database\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'nickname' => 'admin',
            'email' => 'evangelos.ilias87@gmail.com',
            'role' => 'admin',
            'avatar' => 'https://www.gravatar.com/avatar/' . md5('evangelos.ilias87@gmail.com') . '?d=identicon',
        ]);
    }
}
