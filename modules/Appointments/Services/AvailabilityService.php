<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Appointments\Contracts\Availability;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentRepository;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Core\Calendar\Contracts\GoogleAuthenticateClient;
use Modules\Core\Calendar\Contracts\GoogleCalendar;
use Modules\Core\Database\Contracts\TokenProvider;
use Modules\Core\Database\Enums\SocialProvider;
use Throwable;

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

        if (!$this->appointmentRepository->bookedAppointments($userId, $startTime, $endTime)) {
            return false;
        }

        $token = $this->tokenProvider->findTokenByUserId($userId, SocialProvider::GOOGLE);
        $client = $this->googleAuthenticateClient->authenticatedClient($userId, $token);

        try {
            return !$this->googleCalendar->isBusy($client, $startTime->toDateTime(), $endTime->toDateTime());
        } catch (Throwable $e) {
            Log::error("Availability Check Error: " . $e->getMessage());
            return true;
        }
    }
}
