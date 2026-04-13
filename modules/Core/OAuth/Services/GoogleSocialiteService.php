<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Services;

use Laravel\Socialite\Facades\Socialite;
use Modules\Core\OAuth\Dto\GoogleTokenDto;
use Modules\Core\OAuth\Dto\GoogleUserDto;
use Modules\Core\OAuth\Exceptions\GoogleCallbackException;
use Modules\Core\OAuth\Exceptions\GoogleRedirectException;
use Modules\Core\OAuth\Services\GoogleSocialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

final readonly class GoogleSocialiteService implements GoogleSocialite
{
    public function redirectToGoogle(): RedirectResponse
    {
        try {
            return Socialite::driver('google')
                ->with(['access_type' => 'offline', 'prompt' => 'consent'])
                ->redirect();
        } catch (Throwable $e) {
            throw new GoogleRedirectException($e->getMessage());
        }
    }

    public function handleGoogleCallback(): GoogleUserDto
    {
        try {
            $google = Socialite::driver('google')->user();

            return new GoogleUserDto(
                $google->getEmail(),
                GoogleTokenDto::fromGoogle($google),
                $google->getNickname(),
                $google->getName(),
                $google->getAvatar(),
            );
        } catch (Throwable $e) {
           throw new GoogleCallbackException($e->getMessage());
        }
    }
}

