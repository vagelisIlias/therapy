<?php

namespace Modules\Appointments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Appointments\Database\Factories\BlockedSlotFactory;

class BlockedSlot extends Model
{
    /** @use HasFactory<BlockedSlotFactory> */
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'reason'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): BlockedSlotFactory
    {
        return new BlockedSlotFactory();
    }
}
