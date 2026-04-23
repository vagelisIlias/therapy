<?php

declare(strict_types=1);

namespace Modules\Google\Exceptions;

use Modules\Core\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;

final class GoogleException extends BaseException
{
    public static function redirect(): self
    {
        return new self(__('google.redirect_exception'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function callback(): self
    {
        return new self(__('google.callback_exception'), Response::HTTP_UNAUTHORIZED);
    }
}
