<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Carbon\Carbon;
use DomainException;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\GoogleTokenProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\OAuth\Dto\GoogleTokenDto;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Throwable;

class EloquentGoogleTokenProvider implements GoogleTokenProvider
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

    public function storeTokenFromGoogle(int $userId, GoogleTokenDto $googleTokenDto): void
    {
        $this->model->create([
            'user_id' => $userId,
            'provider' => $googleTokenDto->provider->value,
            'provider_id' => $googleTokenDto->providerId,
            'access_token' => $googleTokenDto->accessToken,
            'refresh_token' => $googleTokenDto->refreshToken,
            'token_expires_at' => $googleTokenDto->expiresAt,
        ]);
    }

    public function updateTokenAndUserFromGoogle(int $userId, GoogleUserDto $googleUserDto): void
    {
        try {
            $provider = $this->findProviderByUserId($userId, $googleUserDto->googleTokenDto->provider);

            $this->updateToken($userId, $googleUserDto->googleTokenDto);

            $provider->user->update([
                'name' => $googleUserDto->name,
                'nickname' => $googleUserDto->nickname,
                'avatar' => $googleUserDto->avatar,
            ]);

        } catch (Throwable $e) {
            throw new DomainException(__("google.token_and_user_update_failed") . ' ' . $e->getMessage());
        }
    }

    public function updateToken(int $userId, GoogleTokenDto $googleTokenDto): void
    {
        $provider = $this->findProviderByUserId($userId, $googleTokenDto->provider);

        $provider->update([
            'access_token' => $googleTokenDto->accessToken,
            'refresh_token' => $googleTokenDto->refreshToken ?? $provider->refresh_token,
            'token_expires_at' => $googleTokenDto->expiresAt,
        ]);
    }

    public function save(Model $model): void
    {
        $model->save();
    }

    public function tokenByUserId(int $userId, SocialProvider $provider): GoogleTokenDto
    {
        $model = $this->findProviderByUserId($userId, $provider);

        return new GoogleTokenDto(
            $model->provider_id,
            $provider,
            $model->access_token,
            $model->refresh_token,
            $model->token_expires_at,
        );
    }
}
