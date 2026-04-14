<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

final class CheckAvailabilityException extends ModelNotFoundException
{
    public function __construct()
    {
        parent::__construct(__("check.availability_failed"), Response::HTTP_CONFLICT);
    }
}
