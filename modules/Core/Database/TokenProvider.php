<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;

interface TokenProvider
{
    public function findByProvider(string $provider, string $providerId): ?Model;
    public function findProviderByUserId(int $userId, SocialProvider $provider): Model;
}
