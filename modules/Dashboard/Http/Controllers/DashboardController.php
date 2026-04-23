<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Modules\Core\Appointments\Contracts\AppointmentQuery;
use Modules\Core\Appointments\Contracts\WorkingScheduleQuery;

final class DashboardController
{
    public function __construct(
        private AppointmentQuery $appointmentQuery,
        private WorkingScheduleQuery $workingScheduleQuery
    ){}

    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard');
    }

    public function dashboardCalendar(Request $request): \Inertia\Response
    {
        return Inertia::render('dashboard/Calendar', [
            'appointments' => $this->appointmentQuery->list(auth()->id()),
            'workingSchedule' => $this->workingScheduleQuery->list(auth()->id()),
        ]);
    }
}
