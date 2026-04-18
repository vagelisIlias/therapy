<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Modules\Users\Database\Models\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface GoogleAuthentication
{
    public function redirectToGoogle(): RedirectResponse;
    public function handleGoogleCallback(): User;
}
