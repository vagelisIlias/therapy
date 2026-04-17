<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\Google\UserGoogleLogin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

final readonly class HandleGoogleProviderCallbackController
{
    public function __construct(private UserGoogleLogin $userGoogleLogin,)
    {
    }

    public function __invoke(): RedirectResponse
    {
        try {
            $user = $this->userGoogleLogin->handleGoogleCallback();
            return redirect()->route($user->redirectRoute(), ['locale' => app()->getLocale()]);
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors(__('google.connection_error'));
        }
    }
}
