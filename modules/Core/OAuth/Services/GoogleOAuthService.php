<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Services;

use Laravel\Socialite\Socialite;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class GoogleOAuthService implements GoogleOAuth
{
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): GoogleUserDto
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        return new GoogleUserDto(
            $googleUser->getId(),
            $googleUser->getEmail(),
            $googleUser->getName(),
            $googleUser->getNickname(),
            $googleUser->getAvatar(),
        );
    }
}
