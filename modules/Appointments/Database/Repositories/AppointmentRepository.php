<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Modules\Appointments\Database\Enum\Status;
use Modules\Appointments\Database\Models\Appointment;

interface AppointmentRepository
{
    public function checkingAppointment(int $userId, Carbon $start, Carbon $end): bool;
    public function createAppointment(int $userId, string $googleEventId, Carbon $startTime, Carbon $endTime, string $status = Status::BOOKED->value): Appointment;
}
