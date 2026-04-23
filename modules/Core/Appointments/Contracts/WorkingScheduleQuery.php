<?php

declare(strict_types=1);

namespace Modules\Core\Appointments\Contracts;

use Modules\Core\Appointments\Dto\WorkingScheduleDto;
use Modules\Core\Database\Model\Model;

interface WorkingScheduleQuery
{
    public function list(int $userId): array;
    public function isOpen(int $userId, WorkingScheduleDto $dto): bool;
    public function update(int $userId, WorkingScheduleDto $workingScheduleDto): Model;
}
