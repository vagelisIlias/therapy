<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Appointments\Database\Factories\AppointmentFactory;
use Modules\Appointments\Exceptions\AppointmentNotFoundException;
use Modules\Core\Database\Model\Model;
use Modules\Users\Database\Models\User;

class Appointment extends Model
{
    /** @use HasFactory<AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
        'status',
        'duration'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function newModelNotFoundException(): AppointmentNotFoundException
    {
        return new AppointmentNotFoundException();
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside modules
     *
     */
    protected static function newFactory(): AppointmentFactory
    {
        return new AppointmentFactory();
    }
}
