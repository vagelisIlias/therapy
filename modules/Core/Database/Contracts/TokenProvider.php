<?php

declare(strict_types=1);

namespace Modules\Core\Database\Contracts;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\OAuth\Dto\TokenDto;

interface TokenProvider
{
    public function findByProvider(string $provider, string $providerId): ?Model;
    public function findProviderByUserId(int $userId, SocialProvider $provider): Model;
    public function findTokenByUserId(int $userId, SocialProvider $provider): ?TokenDto;
}
