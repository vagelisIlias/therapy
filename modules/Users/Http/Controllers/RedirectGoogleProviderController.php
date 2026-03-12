<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Google\UserGoogleLogin;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class RedirectGoogleProviderController
{
    public function __construct(private UserGoogleLogin $userGoogleLogin)
    {
    }

    public function __invoke(): RedirectResponse
    {
        return $this->userGoogleLogin->redirectToGoogle();
    }
}
