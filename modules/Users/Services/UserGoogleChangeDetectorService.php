<?php

declare(strict_types=1);

namespace Modules\Users\Services;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Dto\UserGoogleChangesDto;
use Modules\Users\Models\User;

final class UserGoogleChangeDetectorService implements UserGoogleChangeDetector
{
    public function updateFromGoogle(User $user, GoogleUserDto $dto): UserGoogleChangesDto
    {
        $changes = new UserGoogleChangesDto();

        if($dto->name !== null && $dto->name !== $user->name) {
            $user->name = $dto->name;
            $changes->name = $dto->name;
        }

        if ($dto->nickname !== null && $dto->nickname !== $user->nickname) {
            $user->nickname = $dto->nickname;
            $changes->nickname = $dto->nickname;
        }

        if ($dto->avatar !== null && $dto->avatar !== $user->avatar) {
            $user->avatar = $dto->avatar;
            $changes->avatar = $dto->avatar;
        }

        if ($changes->hasChanges()) {
            $user->save();
        }

        return $changes;
    }
}
