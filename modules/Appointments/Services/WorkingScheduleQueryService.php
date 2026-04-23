<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Modules\Appointments\Commands\UpdateWorkingSchedule;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Core\Appointments\Contracts\WorkingScheduleQuery;
use Modules\Core\Appointments\Dto\WorkingScheduleDto;

/*
 * Creating queries to share logic with other domains implementing sharing contracts
 *
*/
final readonly class WorkingScheduleQueryService implements WorkingScheduleQuery
{
    public function __construct(
        private WorkingScheduleRepository $workingScheduleRepository,
    ) {}

    public function list(int $userId): array
    {
        return $this->workingScheduleRepository->findWorkingScheduleByUserId($userId)->toArray();
    }

    public function isOpen(int $userId, WorkingScheduleDto $workingScheduleDto): bool
    {
        return $this->workingScheduleRepository->isWithinWorkingSchedule($userId, $workingScheduleDto);
    }

    public function update(int $userId, WorkingScheduleDto $workingScheduleDto): WorkingSchedule
    {
        return dispatch_sync(new UpdateWorkingSchedule($userId, $workingScheduleDto));
    }
}
