<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Appointments\Http\Controllers\AppointmentController;
use Modules\Appointments\Http\Controllers\AppointmentSettingsController;
use Modules\Appointments\Http\Controllers\AvailableSlotsController;
use Modules\Appointments\Http\Controllers\WorkingHoursController;
use Modules\Core\OAuth\Middleware\HasDashboardAccess;

// Route::prefix('public')->group(function () {
//     Route::get('/available-slots', AvailableSlotsController::class);
//     Route::post('/book-appointment', AppointmentController::class);
// });

Route::middleware(['auth', HasDashboardAccess::class])->group(function () {

    // Route::get('/settings', GetAppointmentSettingsController::class);
    // Route::put('/settings', UpdateAppointmentSettingsController::class);

    // Route::get('/working-hours', WorkingHoursController::class);
    // Route::put('/working-hours', UpdateWorkingHoursController::class);

    // Route::get('/appointments', ListAppointmentsController::class);
    // Route::delete('/appointments/{id}', CancelAppointmentController::class);
});
