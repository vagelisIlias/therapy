<?php

declare(strict_types=1);

namespace Modules\Appointments\Providers;

use Modules\Appointments\Services\Appointment;
use Modules\Appointments\Services\AppointmentService;
use Modules\Appointments\Services\Availability;
use Modules\Appointments\Services\AvailabilityService;
use Modules\Appointments\Services\Schedule;
use Modules\Appointments\Services\ScheduleService;
use Modules\Appointments\Services\SlotGenerator;
use Modules\Appointments\Services\SlotGeneratorService;

final class AppointmentServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Appointment::class, AppointmentService::class);
        $this->app->singleton(Availability::class, AvailabilityService::class);
        $this->app->singleton(SlotGenerator::class, SlotGeneratorService::class);
        $this->app->singleton(Schedule::class, ScheduleService::class);
    }

    /**
     *
     * Here we can register, bind, etc providers, routes, migrations etc
     *
     **/
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
    }
}
