<?php

declare(strict_types=1);

namespace Modules\Users\Commands;

use Modules\Users\Services\Google\GoogleAuthentication;

readonly class HandleGoogleAuthentication
{
    public function handle(GoogleAuthentication $service)
    {
        return $service->handleGoogleCallback();
    }
}
