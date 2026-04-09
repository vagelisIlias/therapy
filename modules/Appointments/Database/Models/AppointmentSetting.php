<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Appointments\Database\Factories\AppointmentSettingFactory;
use Modules\Users\Database\Models\User;

class AppointmentSetting extends Model
{
    /** @use HasFactory<AppointmentSettingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_duration',
        'break_between_sessions',
        'max_sessions_per_day'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside modules
     *
     */
    protected static function newFactory(): AppointmentSettingFactory
    {
        return new AppointmentSettingFactory();
    }
}
