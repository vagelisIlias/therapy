<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories\Contracts;

use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Core\OAuth\Dto\UserDto;

interface TokenRepository
{
    public function createToken(int $userId, TokenDto $tokenDto): void;
    public function updateSocialTokenAndUser(int $userId, UserDto $userDto): void;
    public function updateToken(int $userId, TokenDto $tokenDto): void;
    public function tokenByUserId(int $userId, SocialProvider $provider): TokenDto;
}
