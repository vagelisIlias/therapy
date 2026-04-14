<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Modules\Appointments\Database\Models\WorkingSchedule;

interface WorkingScheduleRepository
{
    public function checkingWorkingSchedule(int $userId, Carbon $start, Carbon $end): bool;
    public function workingScheduleDays(int $userId, int $dayOfWeek): ?WorkingSchedule;
}
