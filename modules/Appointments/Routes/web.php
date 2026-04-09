<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Appointments\Http\Controllers\AppointmentController;
use Modules\Appointments\Http\Controllers\AppointmentSettingsController;
use Modules\Appointments\Http\Controllers\AvailableSlotsController;
use Modules\Appointments\Http\Controllers\WorkingHoursController;
use Modules\Core\OAuth\Middleware\HasDashboardAccess;

Route::middleware(['auth', HasDashboardAccess::class])->group(function () {

    // Route::get('/appointments', AppointmentController::class);
    // Route::put('/appointments/{id}', UpdateAppointmentController::class);
    // Route::delete('/appointments/{id}', DeleteAppointmentController::class);

    // Route::get('/available-slots', AvailableSlotsController::class);
    // Route::post('/available-slots', StoreAvailableSlotController::class);
    // Route::delete('/available-slots/{id}', DeleteAvailableSlotController::class);

    // Route::get('/appointment-settings', AppointmentSettingsController::class);
    // Route::put('/appointment-settings', UpdateAppointmentSettingsController::class);

    // Route::get('/working-hours', WorkingHoursController::class);
    // Route::post('/working-hours', StoreWorkingHourController::class);
    // Route::put('/working-hours/{id}', UpdateWorkingHourController::class);
});
