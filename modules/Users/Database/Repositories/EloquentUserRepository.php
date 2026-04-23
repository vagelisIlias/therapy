<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\Database\EloquentRepository;
use Modules\Core\OAuth\Dto\UserDto;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Repositories\Contracts\UserRepository;

final class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->newQuery()->where('email', $email)->first();
    }

    public function createOrUpdate(UserDto $userDto): User
    {
        return $this->model->newQuery()->updateOrCreate(
            ['email' => $userDto->email],
            [
                'name' => $userDto->name,
                'nickname' => $userDto->nickname,
                'avatar' => $userDto->avatar,
            ]
        );
    }
}
