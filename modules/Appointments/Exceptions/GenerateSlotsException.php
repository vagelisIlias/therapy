<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Http\Response;
use Modules\Core\Exceptions\BaseException;

final class GenerateSlotsException extends BaseException
{
    public static function slotsFailed(): self
    {
        return new self(__("generate.slots_failed"), Response::HTTP_CONFLICT);
    }
}
