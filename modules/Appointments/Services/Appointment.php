<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Core\Calendar\Dto\GoogleCalendarDto;

interface Appointment
{
    public function createAppointment(int $userId, GoogleCalendarDto $googleDto, bool $ignoreAvailability = false): string;
}
