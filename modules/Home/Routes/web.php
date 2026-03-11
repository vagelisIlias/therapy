<?php

declare(strict_types=1);

use Modules\Core\Middleware\Localization;
use Modules\Home\Http\Controllers\ContactController;
use Modules\Home\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\PostController;

Route::prefix('{locale?}')
    ->middleware(Localization::class)
    ->group(function () {
        Route::get('/', HomeController::class)->name('home');
        Route::get('/posts/{slug}', PostController::class)->name('post');
        Route::get('/contact', ContactController::class)->name('contact');
    });
