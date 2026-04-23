<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Core\Appointments\Dto\WorkingScheduleDto;
use Modules\Core\Database\EloquentRepository;

final class EloquentWorkingScheduleRepository extends EloquentRepository implements WorkingScheduleRepository
{
    public function __construct(WorkingSchedule $model)
    {
        parent::__construct($model);
    }

    public function isWithinWorkingSchedule(int $userId, WorkingScheduleDto $dto): bool
    {
        if (!$dto->startTime || !$dto->endTime) {
            return false;
        }

        $workDay = $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('day_of_week', $dto->dayOfWeek)
            ->where('is_open', true)
            ->first();

        if (!$workDay) return false;

        $requestStart = $dto->startTime->format('H:i:s');
        $requestEnd = $dto->endTime->format('H:i:s');

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

    public function updateOrCreateWorkingSchedule(int $userId, WorkingScheduleDto $workingScheduleDto): WorkingSchedule
    {
        return $this->model->newQuery()->updateOrCreate(
            [
                'user_id' => $userId,
                'day_of_week' => $workingScheduleDto->dayOfWeek
            ],
            [
                'start_time' => $workingScheduleDto->startTime?->format('H:i:s'),
                'end_time'   => $workingScheduleDto->endTime?->format('H:i:s'),
                'is_open'    => $workingScheduleDto->isOpen,
            ]
        );
    }
}
