<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Http\Response;
use Modules\Core\Exceptions\BaseException;

final class WorkingScheduleException extends BaseException
{
    public static function invalidRange(): self
    {
        return new self(__("invalid.working_schedule_range_exception"), Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function updateException(): self
    {
        return new self(__("update.working_schedule_exception"), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
