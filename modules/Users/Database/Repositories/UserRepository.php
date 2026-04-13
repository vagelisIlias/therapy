<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Database\Models\User;

interface UserRepository
{
    public function findOrCreateFromGoogle(GoogleUserDto $googleUserDto): User;
}
