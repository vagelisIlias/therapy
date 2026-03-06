<?php

declare(strict_types=1);

namespace Modules\Users\Providers;

use Modules\Users\Services\Google\UserGoogleLogin;
use Modules\Users\Services\Google\UserGoogleLoginService;
use Modules\Users\Services\Login\UserLogin;
use Modules\Users\Services\Login\UserLoginService;

final class UserServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->app->bind(UserLogin::class, UserLoginService::class);
        $this->app->bind(UserGoogleLogin::class, UserGoogleLoginService::class);
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
