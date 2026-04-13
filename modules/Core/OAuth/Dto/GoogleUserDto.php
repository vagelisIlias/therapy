<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Dto;

use Modules\Core\OAuth\Dto\GoogleTokenDto;

readonly class GoogleUserDto
{
    public function __construct(
        public string $email,
        public GoogleTokenDto $googleTokenDto,
        public ?string $nickname = null,
        public string $name,
        public ?string $avatar = null,
    ) {}
}
