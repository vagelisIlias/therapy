<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Appointments\Dto\AppointmentDto;
use Modules\Appointments\Services\AppointmentCalendar;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Modules\Core\Calendar\Services\Calendar\GoogleToken;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\GoogleTokenProvider;

final class AppointmentCalendarService implements AppointmentCalendar
{
    public function __construct(
        private GoogleCalendar $googleCalendar,
        private GoogleToken $googleToken,
        private GoogleTokenProvider $googleTokenProvider,
    ) {
    }

    public function createAppointment(int $userId, AppointmentDto $appointmentDto): string
    {
        $token = $this->googleTokenProvider->tokenByUserId($userId, SocialProvider::GOOGLE);
        $client = $this->googleToken->authenticatedClient($userId, $token);

        $eventId = $this->googleCalendar->createEvent(
            $client,
            new GoogleCalendarDto(
                $appointmentDto->title,
                $appointmentDto->description,
                $appointmentDto->start,
                $appointmentDto->end,
                $appointmentDto->timezone,
                $appointmentDto->attendees,
            )
        );

        return $eventId;
    }
}
