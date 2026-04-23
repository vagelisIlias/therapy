<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\Database\EloquentTokenProvider;
use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Core\OAuth\Dto\UserDto;
use Modules\Users\Database\Models\UserProvider;
use Modules\Users\Database\Repositories\Contracts\TokenRepository;
use Modules\Users\Exceptions\TokenException;
use Throwable;

class EloquentTokenRepository extends EloquentTokenProvider implements TokenRepository
{
    public function __construct(UserProvider $model)
    {
        parent::__construct($model);
    }

    public function createToken(int $userId, TokenDto $tokenDto): void
    {
        try {
            $this->model->newQuery()->create([
                'user_id'          => $userId,
                'provider'         => $tokenDto->provider->value,
                'provider_id'      => $tokenDto->providerId,
                'access_token'     => $tokenDto->accessToken,
                'refresh_token'    => $tokenDto->refreshToken,
                'token_expires_at' => $tokenDto->expiresAt,
            ]);
        } catch (Throwable) {
            throw TokenException::createToken();
        }
    }

    public function updateSocialTokenAndUser(int $userId, UserDto $userDto): void
    {
        try {
            $provider = $this->findProviderByUserId($userId, $userDto->tokenDto->provider);

            $this->updateToken($userId, $userDto->tokenDto);

            $provider->user->update([
                'name'     => $userDto->name,
                'nickname' => $userDto->nickname,
                'avatar'   => $userDto->avatar,
            ]);

        } catch (Throwable) {
            throw TokenException::updateTokenAndUser();
        }
    }

    public function updateToken(int $userId, TokenDto $tokenDto): void
    {
        try {
            $provider = $this->findProviderByUserId($userId, $tokenDto->provider);

            $data = [
                'access_token' => $tokenDto->accessToken,
                'token_expires_at' => $tokenDto->expiresAt,
            ];

            if ($tokenDto->refreshToken !== null) {
                $data['refresh_token'] = $tokenDto->refreshToken;
            }

            $this->update($provider->id, $data);
        } catch (Throwable) {
            throw TokenException::updateToken();
        }
    }
}
