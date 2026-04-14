<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Appointments\Database\Repositories\AppointmentSettingsRepository;
use Modules\Appointments\Database\Repositories\WorkingScheduleRepository;
use Modules\Appointments\Dto\SlotGeneratorDto;
use Modules\Appointments\Exceptions\GenerateSlotsException;
use Throwable;

final class SlotGeneratorService implements SlotGenerator
{
    public function __construct(
        private readonly Availability $availability,
        private WorkingScheduleRepository $workingScheduleRepository,
        private AppointmentSettingsRepository $appointmentSettingsRepository,
    ) {
    }

    /**
     * @return SlotGeneratorDto[]
     */
    public function generateSlots(int $userId, Carbon $date): array
    {
        try {
            $settings = $this->appointmentSettingsRepository->appointmentSettings($userId);

            $duration = $settings->session_duration ?? 50;
            $break = $settings->break_between_sessions ?? 10;
            $maxSessions = $settings->max_sessions_per_day ?? 5;
            $totalStep = $duration + $break;

            $schedule = $this->workingScheduleRepository->workingScheduleDays($userId, $date->dayOfWeek);

            if (!$schedule || !$schedule->is_open) {
                return [];
            }

            $currentStart = $date->copy()->setTimeFromTimeString($schedule->start_time);
            $dayEnd = $date->copy()->setTimeFromTimeString($schedule->end_time);

            $availableSlots = [];

            while ($currentStart->copy()->addMinutes($duration) <= $dayEnd && count($availableSlots) < $maxSessions) {

                $currentEnd = $currentStart->copy()->addMinutes($duration);

                if ($this->availability->checkAvailability($userId, $currentStart, $currentEnd)) {
                    $availableSlots[] = new SlotGeneratorDto(
                        start: $currentStart->toDateTimeString(),
                        end: $currentEnd->toDateTimeString(),
                        timeLabel: $currentStart->format('H:i')
                    );
                }

                $currentStart->addMinutes($totalStep);
            }

            return $availableSlots;

        } catch (Throwable $e) {
            Log::error('Generate Slots Failed: ' . $e->getMessage());
            throw new GenerateSlotsException();
        }
    }
}
