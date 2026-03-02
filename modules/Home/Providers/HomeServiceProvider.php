<?php

declare(strict_types=1);

namespace Modules\Home\Providers;

final class HomeServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        parent::register();
    }

    /**
     *
     * Here we can register, bind, etc providers, routes, migrations etc
     *
     **/
    public function boot(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
