<?php

declare(strict_types=1);

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Models\User;

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

        User::factory()->create([
            'name' => 'Vag Test',
            'nickname' => 'vag-test',
            'email' => 'vag.ilias87@gmail.com',
            'role' => 'customer',
            'avatar' => 'https://www.gravatar.com/avatar/' . md5('vag.ilias87@gmail.com') . '?d=identicon',
        ]);
    }
}
