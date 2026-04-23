<?php

declare(strict_types=1);

namespace Modules\Core\Appointments\Dto;

use Carbon\Carbon;

readonly class WorkingScheduleDto
{
    public function __construct(
        public int $dayOfWeek,
        public Carbon $startTime,
        public Carbon $endTime,
        public ?bool $isOpen = true
    ) {}
}
