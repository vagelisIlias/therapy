<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Modules\Appointments\Database\Models\AppointmentSetting;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentSettingsRepository;
use Modules\Core\Database\EloquentRepository;

final class EloquentAppointmentSettingsRepository extends EloquentRepository implements AppointmentSettingsRepository
{
    public function __construct(AppointmentSetting $model)
    {
        return parent::__construct($model);
    }
    public function appointmentSettingsById(int $userId): ?AppointmentSetting
    {
        return $this->model->newQuery()->where('user_id', $userId)->first();
    }
}
