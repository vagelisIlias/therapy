<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\UserDto;
use Modules\Users\Database\Models\User;

interface UserRepository
{
    public function findByEmail(string $email): ?User;
    public function createOrUpdate(UserDto $userDto): User;
}
