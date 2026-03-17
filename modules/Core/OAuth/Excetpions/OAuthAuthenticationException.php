<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

final class OAuthAuthenticationException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('auth.google_login_failed'), 401);
    }
}
