<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Repositories;

use Modules\Appointments\Database\Models\AppointmentSetting;
use Modules\Core\Database\EloquentRepository;
use Modules\Core\Database\Model\Model;

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
