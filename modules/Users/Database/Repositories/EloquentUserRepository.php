<?php

declare(strict_types=1);

namespace Modules\Users\Database\Repositories;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Users\Models\User;

final class EloquentUserRepository implements UserRepository
{
    public function findOrCreateFromGoogle(GoogleUserDto $googleDto): ?User
    {
       $user = User::where('email', $googleDto->email)->first();

       if ($user) {
           return $user;
       }

       return User::create([
           'name' => $googleDto->name,
           'email' => $googleDto->email,
           'avatar' => $googleDto->avatar,
           'password' => null,
           'role' => 'user',
       ]);
    }
}
