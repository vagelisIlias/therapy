<?php

declare(strict_types=1);

namespace Modules\Users\Contracts;

use Illuminate\Http\RedirectResponse;

use Inertia\Response as InertiaResponse;

interface Authenticator
{
    public function login(): InertiaResponse;
    public function logout(): RedirectResponse;
}
