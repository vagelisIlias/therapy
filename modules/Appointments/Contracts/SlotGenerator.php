<?php

declare(strict_types=1);

namespace Modules\Appointments\Contracts;

use Carbon\Carbon;
use Modules\Appointments\Dto\SlotGeneratorDto;

/**
 * @return SlotGeneratorDto[]
 */
interface SlotGenerator
{
    public function generate(int $userId, Carbon $date): array;
}
