<?php

declare(strict_types=1);

namespace Modules\Appointments\Dto;

readonly class SlotGeneratorDto
{
    public function __construct(
        public string $startTime,
        public string $endTime,
        public string $timeLabel,
    ) {}
}
