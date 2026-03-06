<?php

declare(strict_types=1);

namespace Modules\Users\Services\Login;

interface UserLogin
{
    public function login(): \Inertia\Response;
}
