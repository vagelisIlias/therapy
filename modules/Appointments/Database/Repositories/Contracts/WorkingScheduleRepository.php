<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Core\Appointments\Dto\WorkingScheduleDto;

interface WorkingScheduleRepository
{
    public function isWithinWorkingSchedule(int $userId, WorkingScheduleDto $workingScheduleDto): bool;
    public function findWorkingScheduleByUserId(int $userId): Collection;
    public function findWorkingScheduleInDays(int $userId, int $dayOfWeek): ?WorkingSchedule;
    public function updateOrCreateWorkingSchedule(int $userId, WorkingScheduleDto $workingScheduleDto): WorkingSchedule;
}
