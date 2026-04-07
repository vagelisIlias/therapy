<?php

declare(strict_types=1);

namespace Modules\Users\Providers;

use Modules\Users\Database\Repositories\EloquentUserRepository;
use Modules\Users\Database\Repositories\UserRepository;
use Modules\Users\Services\Auth\Authenticator;
use Modules\Users\Services\Auth\AuthenticatorService;
use Modules\Users\Services\Google\UserGoogleLogin;
use Modules\Users\Services\Google\UserGoogleLoginService;

final class UserServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->app->bind(UserGoogleLogin::class, UserGoogleLoginService::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(Authenticator::class, AuthenticatorService::class);
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
    }
}
