<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Carbon\Carbon;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;
use Modules\Users\Models\UserProvider;

final class EloquentUserRepository implements UserRepository
{
    public function findOrCreateFromGoogle(GoogleUserDto $googleDto): ?User
    {
        $provider = UserProvider::with('user')
            ->where('provider', $googleDto->provider)
            ->where('provider_id', $googleDto->googleId)
            ->first();

        if ($provider) {
          $provider->update([
                'provider_access_token' => $googleDto->accessToken,
                'provider_refresh_token' => $googleDto->refreshToken,
                'provider_token_expires_at' => $this->formatExpiration($googleDto->expiresAt),
            ]);

            $provider->user->update([
                'name' => $googleDto->name,
                'nickname' => $googleDto->nickname,
                'avatar' => $googleDto->avatar,
            ]);

            return $provider->user;
        }

        $user = User::firstOrCreate(
            ['email' => $googleDto->email],
            [
                'name' => $googleDto->name,
                'nickname' => $googleDto->nickname,
                'avatar' => $googleDto->avatar,
            ]);

        $user->providers()->create([
            'name' => $googleDto->name,
            'nickname' => $googleDto->nickname,
            'avatar' => $googleDto->avatar,
        ]);

        UserProvider::create([
            'user_id' => $user->id,
            'provider' => $googleDto->provider,
            'provider_id' => $googleDto->googleId,
            'provider_access_token' => $googleDto->accessToken,
            'provider_refresh_token' => $googleDto->refreshToken,
            'provider_token_expires_at' => $this->formatExpiration($googleDto->expiresAt),
        ]);

        return $user;
    }

    private function formatExpiration(?string $expiresAt): ?Carbon
    {
        return $expiresAt ? Carbon::now()->addSeconds((int) $expiresAt) : null;
    }
}
