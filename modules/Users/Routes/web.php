<?php

declare(strict_types=1);

namespace Modules\Users\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UserProviderController;

Route::get('/auth/{provider}/redirect', [UserProviderController::class, 'redirectToGoogle'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [UserProviderController::class, 'handleGoogleCallback'])->name('auth.callback');
