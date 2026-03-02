<?php

declare(strict_types=1);

use Modules\Appointments\Providers\AppointmentServiceProvider;
use Modules\Customers\Providers\CustomerServiceProvider;
use Modules\Dashboard\Providers\DashboardServiceProvider;
use Modules\Home\Providers\HomeServiceProvider;
use Modules\Users\Providers\UserServiceProvider;

return [
    UserServiceProvider::class,
    AppointmentServiceProvider::class,
    CustomerServiceProvider::class,
    DashboardServiceProvider::class,
    HomeServiceProvider::class,
];
