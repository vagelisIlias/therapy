<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Modules\Appointments\Database\Models\AppointmentSetting;

final class EloquentAppointmentSettingsRepository implements AppointmentSettingsRepository
{
    public function appointmentSettings(int $userId): array
    {
        return AppointmentSetting::where('user_id', $userId)->first();
    }
}
