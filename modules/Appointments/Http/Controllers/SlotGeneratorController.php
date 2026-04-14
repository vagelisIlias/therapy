<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Appointments\Services\SlotGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;

final class SlotGeneratorController
{
    public function __construct(private readonly SlotGenerator $generator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            $this->generator->generateSlots((int) $request->query('user_id'), Carbon::parse($request->query('date'))));
    }
}
