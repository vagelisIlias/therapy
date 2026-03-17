<?php

declare(strict_types=1);

namespace Modules\Users\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\HandleGoogleProviderCallbackController;
use Modules\Users\Http\Controllers\LoginController;
use Modules\Users\Http\Controllers\LogoutController;
use Modules\Users\Http\Controllers\RedirectGoogleProviderController;

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginController::class)->name('login');
    Route::get('/auth/redirect', RedirectGoogleProviderController::class)->name('auth.redirect');
    Route::get('/auth/callback', HandleGoogleProviderCallbackController::class)->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
});
