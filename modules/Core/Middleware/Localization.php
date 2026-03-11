<?php

declare(strict_types=1);

namespace Modules\Core\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class Localization
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (! in_array($locale, ['en', 'el'])) {
            $locale = session('locale') ?: config('app.locale');
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);

        return $next($request);
    }
}
