<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Appointments\Services\Appointment;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AppointmentController
{
    public function __construct(private readonly Appointment $appointment)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $googleDto = new GoogleCalendarDto(
            $request->input('title'),
            $request->input('description'),
            Carbon::parse($request->input('start_time')),
            Carbon::parse($request->input('end_time')),
            $request->input('attendees', []),
            $request->input('timezone', 'UTC')
        );

        return new JsonResponse($this->appointment->createAppointment(
            $request->input('user_id'),
            $googleDto,
            $request->boolean('ignore_availability')
        ));
    }
}
