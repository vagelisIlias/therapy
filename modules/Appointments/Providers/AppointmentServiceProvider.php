<?php

declare(strict_types=1);

namespace Modules\Appointments\Providers;

use Modules\Appointments\Contracts\Availability;
use Modules\Appointments\Contracts\SlotGenerator;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentRepository;
use Modules\Appointments\Database\Repositories\Contracts\AppointmentSettingsRepository;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Appointments\Database\Repositories\EloquentAppointmentRepository;
use Modules\Appointments\Database\Repositories\EloquentAppointmentSettingsRepository;
use Modules\Appointments\Database\Repositories\EloquentWorkingScheduleRepository;
use Modules\Appointments\Services\AppointmentQueryService;
use Modules\Appointments\Services\WorkingScheduleQueryService;
use Modules\Appointments\Services\AvailabilityService;
use Modules\Appointments\Services\SlotGeneratorService;
use Modules\Core\Appointments\Contracts\AppointmentQuery;
use Modules\Core\Appointments\Contracts\WorkingScheduleQuery;

final class AppointmentServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Availability::class, AvailabilityService::class);
        $this->app->singleton(SlotGenerator::class, SlotGeneratorService::class);
        $this->app->singleton(AppointmentRepository::class, EloquentAppointmentRepository::class);
        $this->app->singleton(WorkingScheduleRepository::class, EloquentWorkingScheduleRepository::class);
        $this->app->singleton(AppointmentSettingsRepository::class, EloquentAppointmentSettingsRepository::class);
        $this->app->singleton(AppointmentQuery::class, AppointmentQueryService::class);
        $this->app->singleton(WorkingScheduleQuery::class, WorkingScheduleQueryService::class);
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
