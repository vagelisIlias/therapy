<?php

namespace Modules\Core\Http\Logger;

use Throwable;

trait Logger
{
    protected function logError(Throwable $e, string $message = 'An error occurred'): void
    {
        logger()->error($message . ': ' . $e->getMessage(), [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'user_id' => auth()->user()?->id,
        ]);
    }
}
