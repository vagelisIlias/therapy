<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Enum\Status;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentRepository;
use Modules\Core\Database\EloquentRepository;

final class EloquentAppointmentRepository extends EloquentRepository implements AppointmentRepository
{
    public function __construct(Appointment $model)
    {
        parent::__construct($model);
    }

    public function bookedAppointments(int $userId): Collection
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('status', 'booked')
            ->orderBy('start_time', 'asc')
            ->get(['id', 'start_time', 'end_time', 'status']);
    }

    public function createAppointment(int $userId, string $googleEventId, Carbon $startTime, Carbon $endTime, string $status = Status::BOOKED->value): Appointment
    {
        return $this->create([
            'user_id' => $userId,
            'google_event_id' => $googleEventId,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => $status,
        ]);
    }
}
