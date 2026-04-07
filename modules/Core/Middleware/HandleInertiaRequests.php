<?php

declare(strict_types=1);

namespace Modules\Core\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // Reading the URL here
        $locale = $request->segment(1);

        if (! in_array($locale, ['en', 'el'])) {
            $locale = session('locale') ?: config('app.locale');
        }
        
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user() ? [
                    'id' => $request->user()->id,
                    'name' => $request->user()->name,
                    'email' => $request->user()->email,
                    'avatar' => $request->user()->avatar,
                    'role' => $request->user()->role,
                ] : null,
            ],
            'locale' => $locale,
            'translation' => function () use ($locale) {
                $path = lang_path("$locale.json");
                return file_exists($path)
                    ? json_decode(file_get_contents($path), true)
                    : [];
            }
        ]);
    }
}
