<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Exception;
use Illuminate\Support\Facades\Auth;
use Modules\Core\OAuth\Services\GoogleOAuth;
use Modules\Users\Database\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class UserGoogleLoginService implements UserGoogleLogin
{
    public function __construct(
        private GoogleOAuth $googleOAuth,
        private UserRepository $userRepository,
        private UserGoogleChangeDetector $userGoogleChangeDetector
    ) {
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->googleOAuth->redirectToGoogle();
    }

    /**
     * @throws Exception
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        $googleDto = $this->googleOAuth->handleGoogleCallback();
        $user = $this->userRepository->findOrCreateFromGoogle($googleDto);
        $this->userGoogleChangeDetector->updateFromGoogle($user, $googleDto);

        try {
            Auth::login($user);
            return $user->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()
                ->route('login');
        }
    }
}
