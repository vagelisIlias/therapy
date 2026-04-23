<?php

declare(strict_types=1);

namespace Modules\Google\Services;

use Laravel\Socialite\Facades\Socialite;
use Modules\Core\OAuth\Contracts\GoogleSocialite;
use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Core\OAuth\Dto\UserDto;
use Modules\Google\Exceptions\GoogleException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

final readonly class GoogleSocialiteService implements GoogleSocialite
{
    public function redirectToGoogle(): RedirectResponse
    {
        try {
            return Socialite::driver('google')
                ->scopes(['https://www.googleapis.com/auth/calendar'])
                ->with(['access_type' => 'offline', 'prompt' => 'consent'])
                ->redirect();
        } catch (Throwable $e) {
            throw GoogleException::redirect();
        }
    }

    public function handleGoogleCallback(): UserDto
    {
        try {
            $google = Socialite::driver('google')->user();

            return new UserDto(
                $google->getEmail(),
                TokenDto::mapFromGoogle($google),
                $google->getNickname(),
                $google->getName(),
                $google->getAvatar(),
            );
        } catch (Throwable $e) {
           throw GoogleException::callback();
        }
    }
}

