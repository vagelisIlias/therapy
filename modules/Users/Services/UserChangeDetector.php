<?php

declare(strict_types=1);

namespace Modules\Users\Services;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;

interface UserChangeDetector
{
    public function diff(User $user, GoogleUserDto $dto): array;
}
