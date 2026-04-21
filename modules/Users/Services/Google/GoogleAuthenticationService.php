<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Core\OAuth\Contracts\GoogleSocialite;
use Modules\Users\Contracts\GoogleAuthentication;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Repositories\Contracts\TokenRepository;
use Modules\Users\Database\Repositories\Contracts\UserRepository;

final readonly class GoogleAuthenticationService implements GoogleAuthentication
{
    public function __construct(
        private GoogleSocialite $googleSocialite,
        private UserRepository $userRepository,
        private TokenRepository $tokenRepository,
    ) {
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->googleSocialite->redirectToGoogle();
    }

    public function handleGoogleCallback(): User
    {
        $googleUserDto = $this->googleSocialite->handleGoogleCallback();

        $provider = $this->tokenRepository->findByProvider(
            $googleUserDto->tokenDto->provider->value,
            $googleUserDto->tokenDto->providerId
        );

        if(!$provider) {
            $user = $this->userRepository->createOrUpdate($googleUserDto);
            $this->tokenRepository->createToken($user->id, $googleUserDto->tokenDto);

            Auth::login($user);
            return $user;
        }

        $this->tokenRepository->updateSocialTokenAndUser($provider->user_id, $googleUserDto);
        $user = $provider->user->refresh();
        Auth::login($provider->user);

        return $provider->user;

    }
}
