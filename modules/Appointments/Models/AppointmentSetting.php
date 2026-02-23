<?php

namespace Modules\Appointments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Appointments\Database\Factories\AppointmentSettingFactory;

class AppointmentSetting extends Model
{
    /** @use HasFactory<AppointmentSettingFactory> */
    use HasFactory;

    protected $fillable = [
        'session_duration',
        'slot_interval',
    ];

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): AppointmentSettingFactory
    {
        return new AppointmentSettingFactory();
    }
}
