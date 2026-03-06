<?php

declare(strict_types=1);

namespace Modules\Users\Services\Login;

use Inertia\Inertia;

final readonly class UserLoginService implements UserLogin
{
    public function login(): \Inertia\Response
    {
        return Inertia::render('login/Login');
    }
}
