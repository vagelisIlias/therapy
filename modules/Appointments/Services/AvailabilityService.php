<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Appointments\Database\Repositories\WorkingScheduleRepository;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\Exceptions\MissingSocialTokenException;
use Modules\Core\Database\TokenProvider;

final class AvailabilityService implements Availability
{
    public function __construct(
        private GoogleCalendar $googleCalendar,
        private TokenProvider $tokenProvider,
        private GoogleAuthenticateClient $googleAuthenticateClient,
        private WorkingScheduleRepository $workingScheduleRepository,
        private AppointmentRepository $appointmentRepository,
    ) {
    }

    public function check(int $userId, Carbon $startTime, Carbon $endTime): bool
    {
        if (!$this->workingScheduleRepository->isWithinWorkingSchedule($userId, $startTime, $endTime)) {
            return false;
        }

        if (!$this->appointmentRepository->checkingExistingAppointments($userId, $startTime, $endTime)) {
            return false;
        }

        $token = $this->tokenProvider->tokenByUserId($userId, SocialProvider::GOOGLE);

        try {
            $client = $this->googleAuthenticateClient->authenticatedClient($userId, $token);
            return !$this->googleCalendar->isBusy($client, $startTime->toDateTime(), $endTime->toDateTime());
        } catch (MissingSocialTokenException $e) {
            Log::error("Availability Check Error: " . $e->getMessage());
            return true;
        }
    }
}
