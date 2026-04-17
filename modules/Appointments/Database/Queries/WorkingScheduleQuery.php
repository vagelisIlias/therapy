<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Queries;

use Carbon\Carbon;
use Modules\Appointments\Database\Models\WorkingSchedule;

final class WorkingScheduleQuery
{
    public function checkingWorkingScheduleQuery(int $userId, Carbon $start, Carbon $end): bool
    {
        $workDay = WorkingSchedule::where('user_id', $userId)
            ->where('day_of_week', $start->dayOFWeek())
            ->where('is_open', true)
            ->first();

        if (!$workDay || !$workDay->is_open) {
           return false;
        }

        $requestStart = $start->format('H:i:s');
        $requestEnd = $end->format('H:i:s');

        if ($requestStart < $workDay->start_time || $requestEnd > $workDay->end_time) {
            return false;
        }

        return true;
    }
}
