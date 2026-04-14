<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Appointments\Database\Repositories\AppointmentRepository;
use Modules\Appointments\Database\Repositories\WorkingScheduleRepository;
use Modules\Appointments\Exceptions\CheckAvailabilityException;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Database\Enums\SocialProvider;
use Modules\Core\Database\GoogleTokenProvider;
use Throwable;

final class AvailabilityService implements Availability
{
    public function __construct(
        private GoogleCalendar $googleCalendar,
        private GoogleTokenProvider $googleTokenProvider,
        private GoogleAuthenticateClient $googleAuthenticateClient,
        private WorkingScheduleRepository $workingScheduleRepository,
        private AppointmentRepository $appointmentRepository,
    ) {
    }

    public function checkAvailability(int $userId, Carbon $startTime, Carbon $endTime): bool
    {
        try {
            if (!$this->workingScheduleRepository->checkingWorkingSchedule($userId, $startTime, $endTime)) {
                return false;
            }

            if (!$this->appointmentRepository->checkingAppointment($userId, $startTime, $endTime)) {
                return false;
            }

            $token = $this->googleTokenProvider->tokenByUserId($userId, SocialProvider::GOOGLE);
            if (!$token) {
                throw new \Exception("User has no Google Token connected.");
            }

            $client = $this->googleAuthenticateClient->authenticatedClient($userId, $token);

            return !$this->googleCalendar->isBusy($client, $startTime->toDateTime(), $endTime->toDateTime());
        } catch (Throwable $e) {
            Log::error('Availability Check Failed: ' . $e->getMessage(), ['user_id' => $userId, 'start' => $startTime, 'end' => $endTime]);
            throw new CheckAvailabilityException();
        }
    }
}
