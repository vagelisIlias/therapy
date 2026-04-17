<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Models\WorkingSchedule;

interface WorkingScheduleRepository
{
    public function checkingWorkingSchedule(int $userId, Carbon $start, Carbon $end): bool;
    public function findWorkingScheduleInDays(int $userId, int $dayOfWeek): ?WorkingSchedule;
    public function findWorkingScheduleByUserId(int $userId): Collection;
    public function updateOrCreateWorkingSchedule(int $userId, int $dayOfWeek, array $data): WorkingSchedule;
}
