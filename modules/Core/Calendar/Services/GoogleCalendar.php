<?php

declare(strict_type=1);

namespace Modules\Core\Calendar\Services;

use DateTime;
use Google\Client;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;

interface GoogleCalendar
{
    public function createEvent(Client $client, GoogleCalendarDto $googleCalendarDto): string;
    public function updateEvent(Client $client, string $eventId, GoogleCalendarDto $googleCalendarDto): void;
    public function listEvents(Client $client): array;
    public function deleteEvent(Client $client, string $eventId): void;
    public function isBusy(Client $client, DateTime $startTime, DateTime $endTime): bool;
}
