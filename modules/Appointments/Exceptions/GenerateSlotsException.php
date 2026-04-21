<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Http\Response;
use Modules\Core\Exceptions\BaseException;

final class GenerateSlotsException extends BaseException
{
    public static function slotsException(): self
    {
        return new self(__("generate.slots_exception"), Response::HTTP_CONFLICT);
    }
}
