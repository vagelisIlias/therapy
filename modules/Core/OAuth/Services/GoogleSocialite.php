<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Services;

use Modules\Core\OAuth\Dto\GoogleUserDto;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface GoogleSocialite
{
    public function redirectToGoogle(): RedirectResponse;
    public function handleGoogleCallback(): GoogleUserDto;
}
