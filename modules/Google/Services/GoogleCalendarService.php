<?php

declare(strict_types=1);

namespace Modules\Google\Services;

use DateTime;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event as GoogleEvent;
use Google\Service\Calendar\EventDateTime;
use Google\Service\Calendar\FreeBusyRequest;
use Google\Service\Calendar\FreeBusyRequestItem;
use Modules\Core\Calendar\Contracts\GoogleCalendar;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;

final class GoogleCalendarService implements GoogleCalendar
{
    public function createEvent(Client $client, GoogleCalendarDto $googleCalendarDto): string
    {
        $service = new Calendar($client);

        $start = new EventDateTime();
        $start->setDateTime($googleCalendarDto->startTime->toRfc3339String());
        $start->setTimeZone($googleCalendarDto->timezone);

        $end = new EventDateTime();
        $end->setDateTime($googleCalendarDto->endTime->toRfc3339String());
        $end->setTimeZone($googleCalendarDto->timezone);

        $event = new GoogleEvent([
            'summary' => $googleCalendarDto->title,
            'description' => $googleCalendarDto->description,
            'attendees' => array_map(fn($email) => ['email' => $email], $googleCalendarDto->attendees),
        ]);

        $event->setStart($start);
        $event->setEnd($end);

        $created = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        return $created->getId();
    }

    public function updateEvent(Client $client, string $eventId, GoogleCalendarDto $googleCalendarDto): void
    {
        $service = new Calendar($client);

        $event = $service->events->get('primary', $eventId);

        $event->setSummary($googleCalendarDto->title);
        $event->setDescription($googleCalendarDto->description);

        $start = new EventDateTime();
        $start->setDateTime($googleCalendarDto->startTime->toRfc3339String());
        $start->setTimeZone($googleCalendarDto->timezone);

        $end = new EventDateTime();
        $end->setDateTime($googleCalendarDto->endTime->toRfc3339String());
        $end->setTimeZone($googleCalendarDto->timezone);

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

    public function isBusy(Client $client, DateTime $startTime, DateTime $endTime): bool
    {
        $service = new Calendar($client);
        $request = new FreeBusyRequest();

        $request->setTimeMin($startTime->format(DateTime::RFC3339));
        $request->setTimeMax($endTime->format(DateTime::RFC3339));
        $request->setTimeZone('Europe/Athens');
        $request->setItems([['id' => 'primary']]);

        $item = new FreeBusyRequestItem();

        $item->setId('primary');
        $request->setItems([$item]);

        $query = $service->freebusy->query($request);

        return count($query->getCalendars()['primary']->getBusy()) > 0;
    }
}
