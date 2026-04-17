<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Queries\WorkingScheduleQuery;

final class EloquentWorkingScheduleRepository implements WorkingScheduleRepository
{
    public function __construct(private WorkingScheduleQuery $workingScheduleQuery)
    {
    }

    public function checkingWorkingSchedule(int $userId, Carbon $start, Carbon $end): bool
    {
        return $this->workingScheduleQuery->checkingWorkingScheduleQuery($userId, $start, $end);
    }

    public function findWorkingScheduleInDays(int $userId, int $dayOfWeek): ?WorkingSchedule
    {
        return WorkingSchedule::where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->first();
    }

    public function findWorkingScheduleByUserId(int $userId): Collection
    {
        return WorkingSchedule::where('user_id', $userId)->findOrFail();
    }

    public function updateOrCreateWorkingSchedule(int $userId, int $dayOfWeek, array $data): WorkingSchedule
    {
        $schedule = WorkingSchedule::firstOrNew([
            'user_id' => $userId,
            'day_of_week' => $dayOfWeek,
        ]);

        $schedule->fill($data);
        $schedule->save();

        return $schedule;
    }
}
