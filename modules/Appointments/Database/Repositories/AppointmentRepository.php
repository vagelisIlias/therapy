<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Modules\Appointments\Database\Models\Appointment;

interface AppointmentRepository
{
    public function create(array $data): Appointment;
    public function delete(Appointment $appointment): void;
    public function find(int $id): ?Appointment;
    public function findAll(): Collection;
    public function findByUserId(int $userId): Collection;
    public function findByDateRange(Carbon $start, Carbon $end): Collection;
    public function update(int $id, array $data): Appointment;
    public function save(Appointment $appointment): Appointment;
}
