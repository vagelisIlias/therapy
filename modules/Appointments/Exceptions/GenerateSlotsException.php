<?php

declare(strict_types=1);

namespace Modules\Appointments\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class GenerateSlotsException extends ModelNotFoundException
{
    public function __construct()
    {
        parent::__construct(__("generate.slots_failed"), Response::HTTP_CONFLICT);
    }
}
