<?php

declare(strict_types=1);

namespace Modules\Core\Database\Exceptions;

use Modules\Core\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;

final class TokenException extends BaseException
{
    public static function missingToken(): self
    {
        return new self(__('google.token_not_found'), Response::HTTP_NOT_FOUND);
    }

    public static function updateTokenAndUser(): self
    {
        return new self(__('google.token_and_user_update_failed'), Response::HTTP_CONFLICT);
    }
}
