<?php

declare(strict_types=1);

namespace Modules\Users\Exceptions;

use Modules\Core\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;

final class TokenException extends BaseException
{
    public static function missingToken(): self
    {
        return new self(__('token.not_found'), Response::HTTP_NOT_FOUND);
    }

    public static function updateTokenAndUser(): self
    {
        return new self(__('token.and_user_update_exception'), Response::HTTP_CONFLICT);
    }

    public static function updateToken(): self
    {
        return new self(__('token.update_exception'), Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function createToken(): self
    {
        return new self(__("create.token_exception"), Response::HTTP_CONFLICT);
    }
}
