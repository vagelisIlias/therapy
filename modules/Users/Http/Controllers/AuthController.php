<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;
use Modules\Users\Commands\HandleGoogleAuthentication;
use Modules\Users\Contracts\Authenticator;
use Modules\Users\Contracts\GoogleAuthentication;
use Throwable;

final readonly class AuthController
{
    public function __construct(
        private Authenticator $auth,
        private GoogleAuthentication $googleLogin
    ) {}

    public function login(): InertiaResponse
    {
        return $this->auth->login();
    }

    public function logout(): RedirectResponse
    {
        $this->auth->logout();
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    }

    public function redirectToGoogle(): RedirectResponse
    {
        try {
            return $this->googleLogin->redirectToGoogle();
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors(__('google.redirect_exception'));
        }
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $user = dispatch_sync(new HandleGoogleAuthentication());

            return redirect()->route($user->redirectRoute(),
                ['locale' => app()->getLocale()]
            );
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors(__('google.connection_exception'));
        }
    }
}
