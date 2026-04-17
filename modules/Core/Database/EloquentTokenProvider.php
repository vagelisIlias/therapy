<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Exceptions\MissingSocialTokenException;
use Modules\Core\Database\Exceptions\UpdateSocialTokenAndUserException;
use Modules\Core\Database\Model\Model;
use Modules\Core\Database\TokenProvider;
use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Core\OAuth\Dto\UserDto;
use Throwable;

class EloquentTokenProvider implements TokenProvider
{
    public function __construct(protected Model $model)
    {
    }

    public function findByProvider(string $provider, string $providerId): ?Model
    {
        return $this->model->newQuery()
            ->where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();
    }

    public function findProviderByUserId(int $userId, SocialProvider $provider): Model
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('provider', $provider->value)
            ->firstOrFail();
    }

    public function storeSocialToken(int $userId, TokenDto $tokenDto): void
    {
        $this->model->create([
            'user_id' => $userId,
            'provider' => $tokenDto->provider->value,
            'provider_id' => $tokenDto->providerId,
            'access_token' => $tokenDto->accessToken,
            'refresh_token' => $tokenDto->refreshToken,
            'token_expires_at' => $tokenDto->expiresAt,
        ]);
    }

    public function updateSocialTokenAndUser(int $userId, UserDto $userDto): void
    {
        try {
            $provider = $this->findProviderByUserId($userId, $userDto->tokenDto->provider);

            $this->updateToken($userId, $userDto->tokenDto);

            $provider->user->update([
                'name' => $userDto->name,
                'nickname' => $userDto->nickname,
                'avatar' => $userDto->avatar,
            ]);

        } catch (Throwable $e) {
            throw new UpdateSocialTokenAndUserException(__("google.token_and_user_update_failed") . ' ' . $e->getMessage());
        }
    }

    public function updateToken(int $userId, TokenDto $tokenDto): void
    {
        $provider = $this->findProviderByUserId($userId, $tokenDto->provider);

        $provider->update([
            'access_token' => $tokenDto->accessToken,
            'refresh_token' => $tokenDto->refreshToken ?? $provider->refresh_token,
            'token_expires_at' => $tokenDto->expiresAt,
        ]);
    }

    public function tokenByUserId(int $userId, SocialProvider $provider): TokenDto
    {
        $model = $this->findProviderByUserId($userId, $provider);

        if (!$model) {
            throw new MissingSocialTokenException();
        }

        return new TokenDto(
            $model->provider_id,
            $provider,
            $model->access_token,
            $model->refresh_token,
            $model->token_expires_at,
        );
    }
}
