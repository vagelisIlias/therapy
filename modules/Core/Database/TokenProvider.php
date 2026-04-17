<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Core\OAuth\Dto\UserDto;

interface TokenProvider
{
    public function findByProvider(string $provider, string $providerId): ?Model;
    public function findProviderByUserId(int $userId, SocialProvider $provider): Model;
    public function storeSocialToken(int $userId, TokenDto $tokenDto): void;
    public function updateSocialTokenAndUser(int $userId, UserDto $userDto): void;
    public function updateToken(int $userId, TokenDto $tokenDto): void;
    public function tokenByUserId(int $userId, SocialProvider $provider): TokenDto;
}
