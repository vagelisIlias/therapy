<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Calendar\Services\GoogleAuthenticateClientService;
use Modules\Core\Calendar\Services\GoogleCalendar;
use Modules\Core\Calendar\Services\GoogleCalendarService;
use Modules\Core\Database\EloquentGoogleTokenProvider;
use Modules\Core\Database\GoogleTokenProvider;
use Modules\Core\OAuth\Services\GoogleSocialite;
use Modules\Core\OAuth\Services\GoogleSocialiteService;

final class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GoogleSocialite::class, GoogleSocialiteService::class);
        $this->app->singleton(GoogleCalendar::class, GoogleCalendarService::class);
        $this->app->singleton(GoogleTokenProvider::class, EloquentGoogleTokenProvider::class);
        $this->app->singleton(GoogleAuthenticateClient::class, GoogleAuthenticateClientService::class);
    }
}
