<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;

final class EloquentUserRepository implements UserRepository
{
    public function findUserByGoogle(GoogleUserDto $dto): ?User
    {
        return User::query()->whereHas('providers', function ($query) use ($dto) {
            $query->where('provider', 'google')
                ->where('provider_id', $dto->googleId);
        })->first();
    }
}
