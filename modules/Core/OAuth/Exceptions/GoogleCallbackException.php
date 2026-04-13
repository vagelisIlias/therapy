<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class GoogleCallbackException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('google.callback_exception'), Response::HTTP_UNAUTHORIZED);
    }
}
