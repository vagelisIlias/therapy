<?php

declare(strict_types=1);

namespace Modules\Users\Http\Controllers;

use Modules\Core\Http\Logger\Logger;
use Modules\Users\Services\Google\UserGoogleLogin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

final readonly class RedirectGoogleProviderController
{
    use Logger;
    
    public function __construct(private UserGoogleLogin $userGoogleLogin)
    {
    }

    public function __invoke(): RedirectResponse
    {
        try {
            return $this->userGoogleLogin->redirectToGoogle();
        } catch (Throwable $e) {
            $this->logError($e, 'Google Redirect Error');
            return redirect()->route('login')->withErrors(__('google.redirect_exception'));
        }
    }
}
