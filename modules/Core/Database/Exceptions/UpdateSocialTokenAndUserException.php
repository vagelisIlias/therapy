<?php

declare(strict_types=1);

namespace Modules\Core\Database\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class UpdateSocialTokenAndUserException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('google.token_and_user_update_failed'), Response::HTTP_CONFLICT);
    }
}
