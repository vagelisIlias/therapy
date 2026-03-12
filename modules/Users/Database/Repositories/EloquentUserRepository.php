<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;
use Modules\Users\Models\UserProvider;

final class EloquentUserRepository implements UserRepository
{
    public function findOrCreateFromGoogle(GoogleUserDto $googleDto): ?User
    {
        $provider = UserProvider::query()
            ->where('provider', 'google')
            ->where('provider_id', $googleDto->googleId)
            ->first();

        if ($provider) {
            $provider->update([
                'provider_access_token' => $googleDto->token,
            ]);

            return $provider->user;
        }

        $user = User::where('email', $googleDto->email)->first();

       if ($user) {
           return $user;
       }

       return User::create([
           'name' => $googleDto->name,
           'email' => $googleDto->email,
           'avatar' => $googleDto->avatar,
           'password' => null,
           'role' => 'user',
       ]);
    }
}
