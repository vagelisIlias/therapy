<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Services;

use App\Exceptions\OAuthAuthenticationException;
use Laravel\Socialite\Socialite;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class GoogleOAuthService implements GoogleOAuth
{
    private const PROVIDER = 'google';

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): GoogleUserDto
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            return new GoogleUserDto(
                googleId: $googleUser->getId(),
                email: $googleUser->getEmail(),
                name: $googleUser->getName(),
                nickname: $googleUser->getNickname(),
                avatar: $googleUser->getAvatar(),
                provider: self::PROVIDER,
                accessToken: $googleUser->accessToken,
                refreshToken: $googleUser->refreshToken,
                expiresAt: $googleUser->expiresAt,
            );
        } catch (\Throwable $e) {
           throw new OAuthAuthenticationException();
        }
    }
}

