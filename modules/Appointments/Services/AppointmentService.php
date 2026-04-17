<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Illuminate\Support\Facades\Log;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\TokenProvider;
use Modules\Appointments\Services\Appointment;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Appointments\Exceptions\AvailableTimeException;
use Modules\Appointments\Exceptions\CreateAppointmentException;
use Throwable;

final class AppointmentService implements Appointment
{
    public function __construct(
        private GoogleCalendar $googleCalendar,
        private GoogleAuthenticateClient $googleAuthenticateClient,
        private TokenProvider $tokenProvider,
        private Availability $availability,
        private AppointmentRepository $appointmentRepository
    ) {
    }

    public function create(int $userId, GoogleCalendarDto $googleCalendarDto, bool $ignoreAvailability = false): string
    {
        try {
            if (!$ignoreAvailability && !$this->availability->check($userId, $googleCalendarDto->startTime, $googleCalendarDto->endTime)) {
                throw new AvailableTimeException();
            }

            $token = $this->tokenProvider->tokenByUserId($userId, SocialProvider::GOOGLE);
            $client = $this->googleAuthenticateClient->authenticatedClient($userId, $token);

            $eventId = $this->googleCalendar->createEvent($client, $googleCalendarDto);

            $this->appointmentRepository->createAppointment(
                $userId,
                $eventId,
                $googleCalendarDto->startTime,
                $googleCalendarDto->endTime
            );

            return $eventId;

        } catch (Throwable $e) {
            Log::error('Error Creating Appointment: ' . $e->getMessage());
            throw new CreateAppointmentException();
        }
    }
}
