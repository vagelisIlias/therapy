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
    ) {}
}
