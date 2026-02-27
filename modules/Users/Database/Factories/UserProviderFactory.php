<?php

namespace Modules\Users\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Users\Models\User;
use Modules\Users\Models\UserProvider;

class UserProviderFactory extends Factory
{
    protected $model = UserProvider::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'provider' => 'google',
            'provider_id' => $this->faker->uuid(),
            'provider_access_token' => $this->faker->uuid(),
            'provider_refresh_token' => $this->faker->uuid(),
            'provider_token_expires_at' => now()->addDays(1),
        ];
    }
}
