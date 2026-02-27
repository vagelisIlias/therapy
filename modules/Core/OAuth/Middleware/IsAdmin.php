<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Middleware;

use Closure;
use Illuminate\Http\Request;
class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (! $user || ! $user->isAdmin()) {
            return redirect('/');
        }

        return $next($request);
    }
}
