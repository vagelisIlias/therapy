<?php

declare(strict_types=1);

namespace Modules\Users\Services\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Modules\Users\Contracts\Authenticator;

final class AuthenticatorService implements Authenticator
{
    public function login(): InertiaResponse
    {
        return Inertia::render('login/Login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    }
}
