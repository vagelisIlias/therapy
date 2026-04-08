<?php

declare(strict_types=1);

namespace Modules\Users\Services\Google;

use Illuminate\Support\Facades\Auth;
use Modules\Core\OAuth\Exceptions\OAuthAuthenticationException;
use Modules\Core\OAuth\Services\GoogleOAuth;
use Modules\Users\Database\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

final readonly class UserGoogleLoginService implements UserGoogleLogin
{
    public function __construct(
        private GoogleOAuth $googleOAuth,
        private UserRepository $userRepository
    ) {
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return $this->googleOAuth->redirectToGoogle();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleDto = $this->googleOAuth->handleGoogleCallback();
            $user = $this->userRepository->findOrCreateFromGoogle($googleDto);

            Auth::login($user);
            return redirect()->route($user->redirectRoute(), ['locale' => app()->getLocale()]);
        } catch (OAuthAuthenticationException $e) {
            return redirect()->route('login')->withErrors([
                'oauth' => $e->getMessage(),
            ]);
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors([
                'oauth' => __('auth.something_went_wrong'),
            ]);
        }
    }
}
