<?php

declare(strict_types=1);

namespace Modules\Core\Appointments\Dto;

use Carbon\Carbon;
use Modules\Appointments\Database\Enum\Status;

readonly class AppointmentDto
{
    public function __construct(
        public Carbon $startTime,
        public Carbon $endTime,
        public ?Status $status = null,
        public ?string $googleEventId = null,
    ) {
    }
}
