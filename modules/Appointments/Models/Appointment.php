<?php

namespace Modules\Appointments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Appointments\Database\Factories\AppointmentFactory;
use Modules\Customers\Models\Customer;
use Modules\Users\Models\User;

class Appointment extends Model
{
    /** @use HasFactory<AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
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

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): AppointmentFactory
    {
        return new AppointmentFactory();
    }
}
