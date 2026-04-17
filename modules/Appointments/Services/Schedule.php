<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Appointments\Database\Models\WorkingSchedule;

interface Schedule
{
    public function check(int $userId, string $dayOfWeek, string $time): bool;
    public function update(int $userId, int $dayOfWeek, array $data): WorkingSchedule;
}
