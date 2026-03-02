<?php

declare(strict_types=1);

namespace Modules\Home\Providers;

use Modules\Core\Providers\BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    protected function getRoutePath(): string
    {
        return __DIR__ . '/../Routes/web.php';
    }
}
