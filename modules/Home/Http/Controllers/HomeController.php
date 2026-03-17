<?php

declare(strict_types=1);

namespace Modules\Home\Http\Controllers;

use Inertia\Inertia;

final readonly class HomeController
{
    public function __invoke()
    {
        return Inertia::render('Home');
    }
}
