<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;

interface Availability
{
    public function checkAvailability(int $userId, Carbon $startTime, Carbon $endTime): bool;
}
