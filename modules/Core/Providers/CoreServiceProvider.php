<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Core\OAuth\Services\GoogleOAuth;
use Modules\Core\OAuth\Services\GoogleOAuthService;

final class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GoogleOAuth::class, GoogleOAuthService::class);
    }
}
