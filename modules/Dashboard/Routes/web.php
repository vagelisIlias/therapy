<?php

declare(strict_types=1);

namespace Modules\Dashboard\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Core\OAuth\Middleware\IsAdmin;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', IsAdmin::class])->prefix('dashboard')->group(function () {
    Route::get('/dashboard', DashboardController::class,)->name('dashboard');
});
