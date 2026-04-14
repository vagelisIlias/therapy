<?php

declare(strict_types=1);

namespace Modules\Appointments\Database\Enum;

enum Status : string
{
    case BOOKED = 'booked';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}
