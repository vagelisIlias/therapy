<?php

declare(strict_types=1);

use Modules\Appointments\Providers\AppointmentServiceProvider;
use Modules\Core\Providers\CoreServiceProvider;
use Modules\Dashboard\Providers\DashboardServiceProvider;
use Modules\Home\Providers\HomeServiceProvider;
use Modules\Users\Providers\UserServiceProvider;

return [
    UserServiceProvider::class,
    AppointmentServiceProvider::class,
    DashboardServiceProvider::class,
    HomeServiceProvider::class,
    CoreServiceProvider::class,
];
