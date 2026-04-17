<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Appointments\Http\Controllers\AppointmentController;

use Modules\Core\OAuth\Middleware\HasDashboardAccess;

Route::prefix('public')->group(function () {
    Route::get('/slots', [AppointmentController::class, 'availableSlots']);
    Route::post('/book', [AppointmentController::class, 'store']);
});

Route::middleware(['auth', HasDashboardAccess::class])->group(function () {
    Route::put('/working-schedule/{dayOfWeek}', [AppointmentController::class, 'updateSchedule'])->name('updateSchedule');
    Route::get('/check-schedule', [AppointmentController::class, 'checkSchedule'])->name('checkSchedule');
});

