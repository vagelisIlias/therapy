<?php

namespace Modules\Customers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Customers\Database\Factories\CustomerTopicFactory;

class CustomerTopic extends Model
{
    /** @use HasFactory<CustomerTopic> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'description',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(CustomerNote::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): CustomerTopicFactory
    {
        return new CustomerTopicFactory();
    }
}
