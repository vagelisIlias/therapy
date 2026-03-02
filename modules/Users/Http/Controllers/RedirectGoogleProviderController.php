<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Modules\Users\Services\UserGoogleLogin;

final readonly class RedirectGoogleProviderController
{
    public function __construct(private UserGoogleLogin $userGoogleLogin,)
    {
    }

    public function __invoke(): RedirectResponse
    {
        return $this->userGoogleLogin->redirectToGoogle();
    }
}
