<?php

declare(strict_types=1);

namespace Modules\Home\Http\Controllers;

use Inertia\Inertia;

final class ContactController
{
    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('home/Home');
    }
}
