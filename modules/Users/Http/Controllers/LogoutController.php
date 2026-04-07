<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Auth\Authenticator;
use Illuminate\Http\RedirectResponse;

final readonly class LogoutController
{
    public function __construct(private Authenticator $auth)
    {
    }

    public function __invoke(): RedirectResponse
    {
        return $this->auth->logout();
    }
}
