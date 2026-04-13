<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event as GoogleEvent;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Google\Service\Calendar\EventDateTime;

final class GoogleCalendarService implements GoogleCalendar
{
    public function createEvent(Client $client, GoogleCalendarDto $dto): string
    {
        $service = new Calendar($client);

        $start = new EventDateTime();
        $start->setDateTime($dto->start->toRfc3339String());
        $start->setTimeZone($dto->timezone);

        $end = new EventDateTime();
        $end->setDateTime($dto->end->toRfc3339String());
        $end->setTimeZone($dto->timezone);

        $event = new GoogleEvent([
            'summary' => $dto->title,
            'description' => $dto->description,
            'attendees' => array_map(fn($email) => ['email' => $email], $dto->attendees),
        ]);

        $event->setStart($start);
        $event->setEnd($end);

        $created = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        return $created->getId();
    }

    public function updateEvent(Client $client, string $eventId, GoogleCalendarDto $dto): void
    {
        $service = new Calendar($client);

        $event = $service->events->get('primary', $eventId);

        $event->setSummary($dto->title);
        $event->setDescription($dto->description);

        $start = new EventDateTime();
        $start->setDateTime($dto->start->toRfc3339String());
        $start->setTimeZone($dto->timezone);

        $end = new EventDateTime();
        $end->setDateTime($dto->end->toRfc3339String());
        $end->setTimeZone($dto->timezone);

        $event->setStart($start);
        $event->setEnd($end);

        $service->events->update('primary', $eventId, $event);
    }

    public function deleteEvent(Client $client, string $eventId): void
    {
        $service = new Calendar($client);

        $service->events->delete('primary', $eventId);
    }

    public function listEvents(Client $client): array
    {
        $service = new Calendar($client);

        $events = $service->events->listEvents('primary');

        return $events->getItems();
    }
}
