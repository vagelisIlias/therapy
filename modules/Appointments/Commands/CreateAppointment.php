<?php

declare(strict_types=1);

namespace Modules\Appointments\Commands;

use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Exceptions\AppointmentException;
use Modules\Appointments\Services\Availability;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\TokenProvider;
use Throwable;

readonly class CreateAppointment
{
    public function __construct(
        public int $userId,
        public GoogleCalendarDto $googleCalendarDto,
        public bool $ignoreAvailability = false
    ) {}

    public function handle(
        GoogleCalendar $googleCalendar,
        GoogleAuthenticateClient $googleAuthenticateClient,
        TokenProvider $tokenProvider,
        Availability $availability,
        AppointmentRepository $repository
    ): Appointment
    {
       try {
            if (!$this->ignoreAvailability && !$availability->check(
                $this->userId,
                $this->googleCalendarDto->startTime,
                $this->googleCalendarDto->endTime
            )) {
                throw AppointmentException::unavailableTime();
            }

            $token = $tokenProvider->tokenByUserId($this->userId, SocialProvider::GOOGLE);
            $client = $googleAuthenticateClient->authenticatedClient($this->userId, $token);
            $eventId = $googleCalendar->createEvent($client, $this->googleCalendarDto);

            return $repository->createAppointment(
                $this->userId,
                $eventId,
                $this->googleCalendarDto->startTime,
                $this->googleCalendarDto->endTime
            );

        } catch (Throwable $e) {
            throw AppointmentException::createFailed();
        }
    }
}
