<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Auth\Authenticator;
use Inertia\Response as InertiaResponse;

final readonly class LoginController
{
    public function __construct(private Authenticator $auth)
    {
    }

    public function __invoke(): InertiaResponse
    {
        return $this->auth->login();
    }
}
