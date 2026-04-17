<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\WorkingScheduleRepository;
use Modules\Appointments\Services\Schedule;

final class ScheduleService implements Schedule
{
    public function __construct(
        private WorkingScheduleRepository $workingScheduleRepository,
    ) {
    }

    public function check(int $userId, string $dayOfWeek, string $time): bool
    {
        return $this->workingScheduleRepository->checkWorkingSchedule($userId, $dayOfWeek, $time);
    }

    public function update(int $userId, int $dayOfWeek, array $data): WorkingSchedule
    {
        return $this->workingScheduleRepository->updateOrCreateWorkingSchedule($userId, $dayOfWeek, $data);
    }
}
