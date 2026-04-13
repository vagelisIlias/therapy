<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Model\Model;
use Modules\Core\OAuth\Dto\GoogleTokenDto;
use Modules\Core\OAuth\Dto\GoogleUserDto;

interface GoogleTokenProvider
{
    public function findByProvider(string $provider, string $providerId): ?Model;
    public function findProviderByUserId(int $userId, SocialProvider $provider): Model;
    public function storeTokenFromGoogle(int $userId, GoogleTokenDto $googleTokenDto): void;
    public function updateTokenAndUserFromGoogle(int $userId, GoogleUserDto $googleUserDto): void;
    public function updateToken(int $userId, GoogleTokenDto $googleTokenDto): void;
    public function save(Model $model): void;
    public function tokenByUserId(int $userId, SocialProvider $provider): GoogleTokenDto;
}
