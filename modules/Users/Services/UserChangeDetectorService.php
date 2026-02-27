<?php

declare(strict_types=1);

namespace Modules\Users\Services;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;

final class UserChangeDetectorService implements UserChangeDetector
{
    /**
     *
     * @return array Checking the updated fields
     */
    public function diff(User $user, GoogleUserDto $dto): array
    {
        $changes = [];

        if($dto->name !== null && $dto->name !== $user->name) {
            $user->name = $dto->name;
            $changes['name'] = $dto->name;
        }

        if ($dto->nickname !== null && $dto->nickname !== $user->name) {
            $user->name = $dto->nickname;
            $changes['nickname'] = $dto->nickname;
        }

        if ($dto->avatar !== null && $dto->avatar !== $user->avatar) {
            $user->avatar = $dto->avatar;
            $changes['avatar'] = $dto->avatar;
        }

        if (!empty($changes)) {
            $user->save();
        }

        return $changes;
    }
}
