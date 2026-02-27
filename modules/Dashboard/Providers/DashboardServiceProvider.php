<?php

namespace Modules\Dashboard\Providers;

final class DashboardServiceProvider extends RouteServiceProvider
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
//        $this->mergeConfigFrom(__DIR__ . '/../Config/users.php', 'users');
    }
}
