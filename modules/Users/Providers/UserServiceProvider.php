<?php

declare(strict_types=1);

namespace Modules\Users\Providers;

use Modules\Users\Contracts\Authenticator;
use Modules\Users\Contracts\GoogleAuthentication;
use Modules\Users\Database\Repositories\Contracts\TokenRepository;
use Modules\Users\Database\Repositories\Contracts\UserRepository;
use Modules\Users\Database\Repositories\EloquentTokenRepository;
use Modules\Users\Database\Repositories\EloquentUserRepository;
use Modules\Users\Services\Auth\AuthenticatorService;
use Modules\Users\Services\Google\GoogleAuthenticationService;

final class UserServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GoogleAuthentication::class, GoogleAuthenticationService::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(Authenticator::class, AuthenticatorService::class);
        $this->app->bind(TokenRepository::class, EloquentTokenRepository::class);
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
