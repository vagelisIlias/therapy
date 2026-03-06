<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface UserGoogleLogin
{
    public function redirectToGoogle(): RedirectResponse;
    public function handleGoogleCallback(): RedirectResponse;
}
