<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;

interface UserRepository
{
    public function findUserByGoogle(GoogleUserDto $dto): ?User;
}
