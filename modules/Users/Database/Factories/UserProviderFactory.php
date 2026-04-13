<?php

declare(strict_types=1);

namespace Modules\Users\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Models\UserProvider;

class UserProviderFactory extends Factory
{
    protected $model = UserProvider::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'provider' => SocialProvider::GOOGLE->value,
            'provider_id' => $this->faker->uuid(),
            'access_token' => $this->faker->uuid(),
            'refresh_token' => $this->faker->uuid(),
            'token_expires_at' => now()->addDays(1),
        ];
    }
}
