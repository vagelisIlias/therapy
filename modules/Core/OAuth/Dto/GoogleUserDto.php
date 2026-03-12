<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Dto;

final class GoogleUserDto
{
    public function __construct(
        public string $googleId,
        public string $email,
        public ?string $name,
        public ?string $nickname,
        public ?string $avatar,
        public ?string $token = null,
        public ?string $refreshToken = null,
        public ?int $expiresIn = null,
    ) {}
}
