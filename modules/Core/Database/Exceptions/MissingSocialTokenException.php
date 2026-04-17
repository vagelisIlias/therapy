<?php

declare(strict_types=1);

namespace Modules\Core\Database\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class MissingSocialTokenException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('google.token_not_found'), Response::HTTP_NOT_FOUND);
    }
}
