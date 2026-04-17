<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Modules\Appointments\Services\SlotGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;

final class SlotGeneratorController
{
    public function __construct(private readonly SlotGenerator $slotGenerator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            $this->slotGenerator->generate((int) $request->query('user_id'), Carbon::parse($request->query('date'))));
    }
}
