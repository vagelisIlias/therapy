<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Core\Database\EloquentGoogleTokenProvider;

final class EloquentAppointmentRepository extends EloquentGoogleTokenProvider implements AppointmentRepository
{
    // public function __construct(UserProvider $model)
    // {
    //     parent::__construct($model);
    // }
}
