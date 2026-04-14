<?php

declare(strict_types=1);

namespace Modules\Appointments\Dto;

readonly class SlotGeneratorDto
{
    public function __construct(
        public string $start,
        public string $end,
        public string $timeLabel,
    ) {}
}
