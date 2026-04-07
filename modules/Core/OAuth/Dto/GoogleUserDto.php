<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Dto;

final class GoogleUserDto
{
    public function __construct(
        public string $providerId,
        public string $email,
        public string $provider,
        public ?string $name,
        public ?string $nickname,
        public ?string $avatar,
        public string $token,
        public ?string $refreshToken,
        public ?int $expiresIn,
    ) {
    }
}
