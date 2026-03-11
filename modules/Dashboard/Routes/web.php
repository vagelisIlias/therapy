<?php

declare(strict_types=1);

namespace Modules\Dashboard\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Core\OAuth\Middleware\IsAdmin;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::middleware(['auth', IsAdmin::class])->prefix('dashboard')->group(function () {
    Route::get('/dashboard', DashboardController::class,)->name('dashboard');
});
