<?php

namespace Modules\Customers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Modules\Customers\Database\Factories\CustomerNoteFactory;

class CustomerNote extends Model
{
    /** @use HasFactory<CustomerNoteFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'customer_id',
        'customer_topic_id',
        'content',
        'homework',
        'summary',
        'intensity_scale',
        'started_at',
        'improved_at',
        'status',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'improved_at' => 'datetime',
        'status' => 'string',
    ];

    public function topics(): BelongsTo
    {
        return $this->belongsTo(CustomerTopic::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): CustomerNoteFactory
    {
        return new CustomerNoteFactory();
    }
}
