<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\Database\EloquentTokenProvider;
use Modules\Core\OAuth\Dto\UserDto;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Models\UserProvider;

final class EloquentUserRepository extends EloquentTokenProvider implements UserRepository
{
    public function __construct(
        private UserProvider $userProvider,
        private User $user
    ) {
        parent::__construct($this->userProvider);
    }

    public function findOrCreateFromGoogle(UserDto $userDto): User
    {
        $provider = $this->findByProvider(
            $userDto->tokenDto->provider->value,
            $userDto->tokenDto->providerId
        );

        if ($provider) {
            $this->updateTokenAndUserFromGoogle($provider->user_id, $userDto);
            return $provider->user;
        }

        $user = $this->user->firstOrCreate(
            ['email' => $userDto->email],
            [
                'name' => $userDto->name,
                'nickname' => $userDto->nickname,
                'avatar' => $userDto->avatar,
            ]
        );

        $this->storeSocialToken($user->id, $userDto->tokenDto);

        return $user;
    }
}
