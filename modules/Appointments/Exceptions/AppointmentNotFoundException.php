<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

final class AppointmentNotFoundException extends ModelNotFoundException
{
    public function __construct()
    {
        parent::__construct(__("appointment_not_found"), Response::HTTP_NOT_FOUND);
    }
}
