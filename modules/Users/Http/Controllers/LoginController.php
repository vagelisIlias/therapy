<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Login\UserLogin;

final readonly class LoginController
{
    public function __construct(private UserLogin $userLogin)
    {
    }

    public function __invoke(): \Inertia\Response
    {
        return $this->userLogin->login();
    }
}
