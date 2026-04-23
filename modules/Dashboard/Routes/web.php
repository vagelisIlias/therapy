<?php

declare(strict_types=1);

namespace Modules\Dashboard\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Core\OAuth\Middleware\HasDashboardAccess;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::middleware(['auth', HasDashboardAccess::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/calendar', [DashboardController::class, 'dashboardCalendar'])->name('dashboard.calendar');
});
