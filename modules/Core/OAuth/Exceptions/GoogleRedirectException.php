<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class GoogleRedirectException extends Exception
{
    public function __construct()
    {
        parent::__construct(__("google.redirect_exception"), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
