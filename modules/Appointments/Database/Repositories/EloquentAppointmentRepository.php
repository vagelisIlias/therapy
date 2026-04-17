<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Modules\Appointments\Database\Enum\Status;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Core\Database\EloquentRepository;

final class EloquentAppointmentRepository extends EloquentRepository implements AppointmentRepository
{
    public function __construct(Appointment $model)
    {
        parent::__construct($model);
    }

    public function checkingExistingAppointments(int $userId, Carbon $start, Carbon $end): bool
    {
        $exists = $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('status', 'booked')
            ->where(function ($q) use ($start, $end) {
                $q->where('start_time', '<', $end)
                ->where('end_time', '>', $start);
            })->exists();

        return !$exists;
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
