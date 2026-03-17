<?php

declare(strict_types=1);

namespace Modules\Users\Services\Auth;

use Illuminate\Http\RedirectResponse;

interface Auth
{
    public function login(): \Inertia\Response;
    public function logout(): RedirectResponse;
}
