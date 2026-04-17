<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Modules\Appointments\Services\Schedule;
use Symfony\Component\HttpFoundation\JsonResponse;

final class GetWorkingScheduleController
{
    public function __construct(private readonly Schedule $service)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse($this->service->check(
            $request->user()->id,
            $request->query('day_of_week'),
            $request->query('time')
        ));
    }
}
