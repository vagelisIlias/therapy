<?php

declare(strict_types=1);

namespace Modules\Appointments\Commands;

use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\WorkingScheduleRepository;
use Modules\Appointments\Exceptions\WorkingScheduleException;
use Throwable;

readonly class UpdateWorkingSchedule
{
    public function __construct(
        public int $userId,
        public int $dayOfWeek,
        public array $data
    ) {}

    public function handle(WorkingScheduleRepository $repository): WorkingSchedule
    {
        try {
            if (isset($this->data['start_time'], $this->data['end_time'])) {
                if ($this->data['start_time'] >= $this->data['end_time']) {
                    throw WorkingScheduleException::invalidRange();
                }
            }

            return $repository->updateOrCreateWorkingSchedule($this->userId, $this->dayOfWeek, $this->data);
        } catch (Throwable $e) {
            throw WorkingScheduleException::updateFailed();
        }
    }
}
