<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

abstract class BaseRouteServiceProvider extends ServiceProvider
{
    abstract protected function getRoutePath(): string;

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group($this->getRoutePath());
        });
    }
}
