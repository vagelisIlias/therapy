<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use Inertia\Inertia;
final class DashboardController
{
    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('dashboard/Dashboard');
    }
}
