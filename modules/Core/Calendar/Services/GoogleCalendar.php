<?php

declare(strict_type=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;

interface GoogleCalendar
{
    public function createEvent(Client $client, GoogleCalendarDto $dto): string;
}
