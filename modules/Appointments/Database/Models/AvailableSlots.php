<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Appointments\Database\Factories\AvailableSlotsFactory;
use Modules\Users\Database\Models\User;

class AvailableSlots extends Model
{
    /** @use HasFactory<AvailableSlots> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
        'reason'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside modules
     *
     */
    protected static function newFactory(): AvailableSlotsFactory
    {
        return new AvailableSlotsFactory();
    }
}
