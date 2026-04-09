<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Database\Repositories\AppointmentRepository;

final class EloquentAppointmentRepository implements AppointmentRepository
{
    public function create(array $data): Appointment
    {
        return Appointment::create($data);
    }

    public function delete(Appointment $appointment): void
    {
        $appointment->delete();
    }

    public function find(int $id): ?Appointment
    {
        return Appointment::find($id);
    }

    public function findAll(): Collection
    {
        return Appointment::with('appointments')->get();
    }

    public function findByUserId(int $userId): Collection
    {
        return Appointment::where('user_id', $userId)->get();
    }

    public function findByDateRange(Carbon $start, Carbon $end): Collection
    {
        return Appointment::whereBetween('scheduled_at', [$start, $end])->get();
    }

    public function update(int $id, array $data): Appointment
    {
        $appointment = $this->find($id);
        if ($appointment) {
            $appointment->update($data);
            return $appointment;
        }
        throw new \Exception("Appointment not found");
    }

    public function save(Appointment $appointment): Appointment
    {
        $appointment->save();
        return $appointment;
    }
}
