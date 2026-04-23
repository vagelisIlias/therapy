<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Enum\Status;
use Modules\Appointments\Database\Models\Appointment;

interface AppointmentRepository
{
    public function bookedAppointments(int $userId): Collection;
    public function createAppointment(int $userId, string $googleEventId, Carbon $startTime, Carbon $endTime, string $status = Status::BOOKED->value): Appointment;
}
