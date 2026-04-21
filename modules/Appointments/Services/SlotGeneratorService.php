<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Appointments\Contracts\Availability;
use Modules\Appointments\Contracts\SlotGenerator;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentSettingsRepository;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Appointments\Dto\SlotGeneratorDto;
use Modules\Appointments\Exceptions\GenerateSlotsException;
use Throwable;

final class SlotGeneratorService implements SlotGenerator
{
    const DEFAULT_SESSION_DURATION = 50;
    const DEFAULT_BREAK_BETWEEN_SESSIONS = 10;
    const DEFAULT_MAX_SESSIONS_PER_DAY = 5;

    public function __construct(
        private readonly Availability $availability,
        private WorkingScheduleRepository $workingScheduleRepository,
        private AppointmentSettingsRepository $appointmentSettingsRepository,
    ) {
    }

    /**
     * @return SlotGeneratorDto[]
     */
    public function generate(int $userId, Carbon $date): array
    {
        $settings = $this->appointmentSettingsRepository->appointmentSettings($userId);

        $duration = $settings->session_duration ?? self::DEFAULT_SESSION_DURATION;
        $break = $settings->break_between_sessions ?? self::DEFAULT_BREAK_BETWEEN_SESSIONS;
        $maxSessions = $settings->max_sessions_per_day ?? self::DEFAULT_MAX_SESSIONS_PER_DAY;
        $totalStep = $duration + $break;

        $schedule = $this->workingScheduleRepository->findWorkingScheduleInDays($userId, $date->dayOfWeek);

        if (!$schedule || !$schedule->is_open || !$schedule->start_time || !$schedule->end_time) {
            return [];
        }

        $currentStart = $date->copy()->setTimeFromTimeString($schedule->start_time);
        $dayEnd = $date->copy()->setTimeFromTimeString($schedule->end_time);
        $availableSlots = [];

        try {
            while ($currentStart->copy()->addMinutes($duration) <= $dayEnd && count($availableSlots) < $maxSessions) {
                $currentEnd = $currentStart->copy()->addMinutes($duration);

                if ($this->availability->check($userId, $currentStart, $currentEnd)) {
                    $availableSlots[] = new SlotGeneratorDto(
                        $currentStart->toDateTimeString(),
                        $currentEnd->toDateTimeString(),
                        $currentStart->format('H:i')
                    );
                }

                $currentStart->addMinutes($totalStep);
            }
        } catch (Throwable $e) {
            Log::error('Error during slot generation: ' . $e->getMessage());
            throw GenerateSlotsException::slotsException();
        }

        return $availableSlots;
    }
}
