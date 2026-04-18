<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\EloquentRepository;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\Database\TokenProvider;

final class EloquentTokenProvider extends EloquentRepository implements TokenProvider
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
}
