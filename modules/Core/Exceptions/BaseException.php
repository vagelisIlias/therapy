<?php

declare(strict_types=1);

namespace Modules\Core\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class BaseException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage(),
            'code'  => $this->getCode()
        ], (int) ($this->getCode() ?: 500));
    }
}
