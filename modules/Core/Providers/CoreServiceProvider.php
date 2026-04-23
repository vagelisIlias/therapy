<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Core\Calendar\Contracts\GoogleAuthenticateClient;
use Modules\Core\Calendar\Contracts\GoogleCalendar;
use Modules\Core\Calendar\Contracts\GoogleClient;
use Modules\Core\Database\Contracts\TokenProvider;
use Modules\Core\Database\EloquentTokenProvider;
use Modules\Core\OAuth\Contracts\GoogleSocialite;
use Modules\Google\Factory\GoogleClientFactory;
use Modules\Google\Services\GoogleAuthenticateClientService;
use Modules\Google\Services\GoogleCalendarService;
use Modules\Google\Services\GoogleSocialiteService;

final class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TokenProvider::class, EloquentTokenProvider::class);
        $this->app->singleton(GoogleSocialite::class, GoogleSocialiteService::class);
        $this->app->singleton(GoogleAuthenticateClient::class, GoogleAuthenticateClientService::class);
        $this->app->singleton(GoogleCalendar::class, GoogleCalendarService::class);
        $this->app->singleton(GoogleClient::class, GoogleClientFactory::class);
    }
}
