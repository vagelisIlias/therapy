<?php

declare(strict_types=1);

namespace Modules\Appointments\Commands;

use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Appointments\Exceptions\WorkingScheduleException;
use Modules\Core\Appointments\Dto\WorkingScheduleDto;
use Throwable;

readonly class UpdateWorkingSchedule
{
    public function __construct(
        public int $userId,
        public WorkingScheduleDto $workingScheduleDto
    ) {}

    public function handle(WorkingScheduleRepository $repository): WorkingSchedule
    {
        try {
            if (isset($this->workingScheduleDto->startTime, $this->workingScheduleDto->endTime)) {
                if ($this->workingScheduleDto->startTime->greaterThanOrEqualTo($this->workingScheduleDto->endTime)) {
                    throw WorkingScheduleException::invalidRange();
                }
            }

            return $repository->updateOrCreateWorkingSchedule($this->userId, $this->workingScheduleDto);
        } catch (Throwable $e) {
            throw WorkingScheduleException::updateException();
        }
    }
}
