<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Dto;

use Carbon\Carbon;

readonly class GoogleCalendarDto
{
    public function __construct(
        public string $title,
        public string $description,
        public Carbon $start,
        public Carbon $end,
        public string $timezone = 'UTC',
        public array $attendees = [],
        public bool $withMeetLink = false,
    ) {}
}
