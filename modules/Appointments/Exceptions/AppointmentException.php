<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Http\Response;
use Modules\Core\Exceptions\BaseException;

final class AppointmentException extends BaseException
{
    public static function notFound(): self
    {
        return new self(__("appointment.not_found"), Response::HTTP_NOT_FOUND);
    }

    public static function unavailableTime(): self
    {
        return new self(__("available.time_not_available"), Response::HTTP_CONFLICT);
    }

    public static function createFailed(): self
    {
        return new self(__("create.appointment_failed"), Response::HTTP_CONFLICT);
    }
}
