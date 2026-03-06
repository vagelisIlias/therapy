<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Dto\UserGoogleChangesDto;
use Modules\Users\Models\User;

interface UserGoogleChangeDetector
{
    public function updateFromGoogle(User $user, GoogleUserDto $dto): UserGoogleChangesDto;
}
