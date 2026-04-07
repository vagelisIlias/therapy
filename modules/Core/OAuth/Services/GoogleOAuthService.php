<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Services;

use Laravel\Socialite\Facades\Socialite;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Core\OAuth\Exceptions\OAuthAuthenticationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class GoogleOAuthService implements GoogleOAuth
{
    private const PROVIDER = 'google';

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')
            ->with(['access_type' => 'offline', 'prompt' => 'consent'])
            ->redirect();
    }

    public function handleGoogleCallback(): GoogleUserDto
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            return new GoogleUserDto(
                providerId: $googleUser->getId(),
                email: $googleUser->getEmail(),
                provider: self::PROVIDER,
                name: $googleUser->getName(),
                nickname: $googleUser->getNickname(),
                avatar: $googleUser->getAvatar(),
                token: $googleUser->token,
                refreshToken: $googleUser->refreshToken,
                expiresIn: $googleUser->expiresIn,
            );
        } catch (\Throwable $e) {
           throw new OAuthAuthenticationException();
        }
    }
}

