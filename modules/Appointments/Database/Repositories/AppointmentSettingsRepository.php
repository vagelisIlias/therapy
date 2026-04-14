<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

interface AppointmentSettingsRepository
{
    public function appointmentSettings(int $userId): array;
}
