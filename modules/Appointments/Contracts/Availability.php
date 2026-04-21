<?php

declare(strict_types=1);

namespace Modules\Appointments\Contracts;

use Carbon\Carbon;

interface Availability
{
    public function check(int $userId, Carbon $startTime, Carbon $endTime): bool;
}
