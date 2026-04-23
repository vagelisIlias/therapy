<?php

declare(strict_types=1);

namespace Modules\Core\Appointments\Contracts;

use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Modules\Core\Database\Model\Model;

interface AppointmentQuery
{
    public function create(int $userId, GoogleCalendarDto $dto, bool $ignoreAvailability = false): Model;
    public function list(int $userId): array;
}
