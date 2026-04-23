<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Contracts\TokenProvider;
use Modules\Core\Database\EloquentRepository;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\OAuth\Dto\TokenDto;

class EloquentTokenProvider extends EloquentRepository implements TokenProvider
{
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

    public function findTokenByUserId(int $userId, SocialProvider $provider): ?TokenDto
    {
        $model = $this->findProviderByUserId($userId, $provider);

        return new TokenDto(
            $model->provider_id,
            $provider,
            $model->access_token,
            $model->refresh_token,
            $model->token_expires_at,
        );
    }
}
