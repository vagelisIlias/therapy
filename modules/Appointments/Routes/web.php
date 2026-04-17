<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Appointments\Http\Controllers\AppointmentController;
use Modules\Appointments\Http\Controllers\AppointmentSettingsController;
use Modules\Appointments\Http\Controllers\AvailableSlotsController;
use Modules\Appointments\Http\Controllers\SlotGeneratorController;
use Modules\Appointments\Http\Controllers\WorkingHoursController;
use Modules\Core\OAuth\Middleware\HasDashboardAccess;

Route::prefix('public')->group(function () {
    Route::get('/slots', SlotGeneratorController::class)->name('slots');
    // Route::post('/book', AppointmentController::class);
});

Route::middleware(['auth', HasDashboardAccess::class])->group(function () {

    // Ρυθμίσεις Συνεδρίας
    // Route::get('/settings', GetAppointmentSettingsController::class);
    // Route::put('/settings', UpdateAppointmentSettingsController::class);

    // Ωράριο Εργασίας
    // Route::get('/working-hours', GetWorkingHoursController::class);
    // Route::put('/working-hours/{id}', UpdateWorkingHourController::class);

    // Διαχείριση Ραντεβού
    // Route::get('/appointments', ListAppointmentsController::class);
    // Route::delete('/appointments/{id}', CancelAppointmentController::class);
});
