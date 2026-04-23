<?php

declare(strict_types=1);

namespace Modules\Appointments\Services;

use Modules\Appointments\Commands\CreateAppointment;
use Modules\Appointments\Database\Models\Appointment;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentRepository;
use Modules\Core\Appointments\Contracts\AppointmentQuery;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;

/*
 * Creating queries to share logic with other domains implementing sharing contracts
 *
*/
final readonly class AppointmentQueryService implements AppointmentQuery
{
    public function __construct(
        private AppointmentRepository $appointmentRepository,
    ) {}

    public function list(int $userId): array
    {
        return $this->appointmentRepository->bookedAppointments($userId)->toArray();
    }

    public function create(int $userId, GoogleCalendarDto $dto, bool $ignoreAvailability = false): Appointment
    {
        return dispatch_sync(new CreateAppointment($userId, $dto, $ignoreAvailability));
    }
}
