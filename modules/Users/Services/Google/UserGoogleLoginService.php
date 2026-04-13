<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Illuminate\Support\Facades\Auth;

use Modules\Core\OAuth\Services\GoogleSocialite;
use Modules\Users\Database\Models\User;
use Modules\Users\Database\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class UserGoogleLoginService implements UserGoogleLogin
{
    public function __construct(
        private GoogleSocialite $googleSocialite,
        private UserRepository $userRepository
    ) {
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->googleSocialite->redirectToGoogle();
    }

    public function handleGoogleCallback(): User
    {
        $googleUserDto = $this->googleSocialite->handleGoogleCallback();
        $user = $this->userRepository->findOrCreateFromGoogle($googleUserDto);

        Auth::login($user);
        return $user;
    }
}
