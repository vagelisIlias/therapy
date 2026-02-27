<?php

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\UserGoogleLogin;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class UserProviderController
{
    public function __construct(private UserGoogleLogin $userGoogleLogin,)
    {
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->userGoogleLogin->redirectToGoogle();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        return $this->userGoogleLogin->handleGoogleCallback();
    }
}
