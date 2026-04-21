<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Core\Database\EloquentRepository;

final class EloquentWorkingScheduleRepository extends EloquentRepository implements WorkingScheduleRepository
{
    public function __construct(WorkingSchedule $model)
    {
        parent::__construct($model);
    }

    public function isWithinWorkingSchedule(int $userId, Carbon $start, Carbon $end): bool
    {
        $workDay = $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('day_of_week', $start->dayOfWeek)
            ->where('is_open', true)
            ->first();

        if (!$workDay) {
            return false;
        }

        $requestStart = $start->format('H:i:s');
        $requestEnd = $end->format('H:i:s');

        return $requestStart >= $workDay->start_time && $requestEnd <= $workDay->end_time;
    }

    public function findWorkingScheduleByUserId(int $userId): Collection
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->orderBy('day_of_week')
            ->get();
    }

    public function findWorkingScheduleInDays(int $userId, int $dayOfWeek): ?WorkingSchedule
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->first();
    }

    public function updateOrCreateWorkingSchedule(int $userId, int $dayOfWeek, array $data): WorkingSchedule
    {
        return $this->model->newQuery()->updateOrCreate(
            [
                'user_id' => $userId,
                'day_of_week' => $dayOfWeek
            ],
            $data
        );
    }
}
