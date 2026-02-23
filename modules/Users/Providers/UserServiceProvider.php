<?php

declare(strict_types=1);

namespace Modules\Users\Providers;

final class UserServiceProvider extends RouteServiceProvider
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
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
//        $this->mergeConfigFrom(__DIR__ . '/../Config/users.php', 'users');
    }
}
