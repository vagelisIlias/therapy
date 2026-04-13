<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Appointments\Dto\AppointmentDto;

interface AppointmentCalendar
{
    public function createAppointment(int $userId, AppointmentDto $appointmentDto): string;
}
