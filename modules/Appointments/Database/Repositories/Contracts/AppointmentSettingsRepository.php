<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories\Contracts;

use Modules\Appointments\Database\Models\AppointmentSetting;

interface AppointmentSettingsRepository
{
    public function appointmentSettingsById(int $userId): ?AppointmentSetting;
}
