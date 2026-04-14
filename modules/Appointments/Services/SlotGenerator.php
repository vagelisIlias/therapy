<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Modules\Appointments\Dto\SlotGeneratorDto;

/**
 * @return SlotGeneratorDto[]
 */
interface SlotGenerator
{
    public function generateSlots(int $userId, Carbon $date): array;
}
