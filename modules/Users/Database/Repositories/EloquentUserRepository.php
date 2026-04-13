<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\Database\EloquentGoogleTokenProvider;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Models\UserProvider;

final class EloquentUserRepository extends EloquentGoogleTokenProvider implements UserRepository
{
    public function __construct(
        private UserProvider $userProvider,
        private User $user
    ) {
        parent::__construct($this->userProvider);
    }

    public function findOrCreateFromGoogle(GoogleUserDto $googleUserDto): User
    {
        $provider = $this->findByProvider(
            $googleUserDto->googleTokenDto->provider->value,
            $googleUserDto->googleTokenDto->providerId
        );

        if ($provider) {
            $this->updateTokenAndUserFromGoogle($provider->user_id, $googleUserDto);
            return $provider->user;
        }

        $user = $this->user->firstOrCreate(
            ['email' => $googleUserDto->email],
            [
                'name' => $googleUserDto->name,
                'nickname' => $googleUserDto->nickname,
                'avatar' => $googleUserDto->avatar,
            ]
        );

        $this->storeTokenFromGoogle($user->id, $googleUserDto->googleTokenDto);

        return $user;
    }
}
