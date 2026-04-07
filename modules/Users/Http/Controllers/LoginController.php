<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Auth\Authenticator;

final readonly class LoginController
{
    public function __construct(private Authenticator $auth)
    {
    }

    public function __invoke(): \Inertia\Response
    {
        return $this->auth->login();
    }
}
