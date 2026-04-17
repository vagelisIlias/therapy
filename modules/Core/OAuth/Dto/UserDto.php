<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Dto;

use Modules\Core\OAuth\Dto\TokenDto;

readonly class UserDto
{
    public function __construct(
        public string $email,
        public TokenDto $tokenDto,
        public ?string $nickname = null,
        public string $name,
        public ?string $avatar = null,
    ) {}
}
