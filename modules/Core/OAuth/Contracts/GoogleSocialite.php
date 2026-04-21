<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Contracts;

use Modules\Core\OAuth\Dto\UserDto;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface GoogleSocialite
{
    public function redirectToGoogle(): RedirectResponse;
    public function handleGoogleCallback(): UserDto;
}
