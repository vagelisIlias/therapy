<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use Inertia\Inertia;
final class DashboardController
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Index');
    }
}
