<?php

namespace Modules\Customers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Customers\Database\Factories\CustomerFactory;

class Customer extends Model
{
    /** @use HasFactory<CustomerFactory> */
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'phone',
        'total_bookings',
        'total_completed',
        'total_cancelled',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(CustomerTopic::class);
    }

    /**
     * Let Laravel know where the factory is, now that it’s inside a module
     */
    protected static function newFactory(): CustomerFactory
    {
        return new CustomerFactory();
    }
}
