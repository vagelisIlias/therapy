<?php

declare(strict_types=1);

namespace Modules\Users\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/auth/redirect', [AuthController::class, 'redirectToGoogle'])->name('auth.redirect');
    Route::get('/auth/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
