<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Auth\Auth;
use Illuminate\Http\RedirectResponse;

final readonly class LogoutController
{
    public function __construct(private Auth $auth)
    {
    }

    public function __invoke(): RedirectResponse
    {
        return $this->auth->logout();
    }
}
