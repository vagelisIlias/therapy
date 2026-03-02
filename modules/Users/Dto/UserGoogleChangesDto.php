<?php

declare (strict_types = 1);

namespace Modules\Users\Dto;

final class UserGoogleChangesDto
{
    public function __construct(
        public ?string $name = null,
        public ?string $nickname = null,
        public ?string $avatar = null,
    ) {
    }

    public function hasChanges(): bool
    {
        return $this->name !== null
            || $this->nickname !== null
            || $this->avatar !== null;
    }
}
