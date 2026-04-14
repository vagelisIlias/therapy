<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Modules\Appointments\Database\Models\WorkingSchedule;

final class EloquentWorkingScheduleRepository implements WorkingScheduleRepository
{
    public function checkingWorkingSchedule(int $userId, Carbon $start, Carbon $end): bool
    {
       $workDay = WorkingSchedule::where('user_id', $userId)
            ->where('day_of_week', $start->dayOFWeek())
            ->where('is_open', true)
            ->first();

        if (!$workDay) {
            return false;
        }

        if (!$workDay->is_open || $workDay->start_time === null || $workDay->end_time === null) {
            return false;
        }

        if ($start->format('H:i:s') < $workDay->start_time || $end->format('H:i:s') > $workDay->end_time) {
            return false;
        }

        return true;
    }

    public function workingScheduleDays(int $userId, int $dayOfWeek): ?WorkingSchedule
    {
        return WorkingSchedule::where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->first();
    }
}
