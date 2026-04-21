<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appointments\Commands\CreateAppointment;
use Modules\Appointments\Commands\UpdateWorkingSchedule;
use Modules\Appointments\Contracts\SlotGenerator;
use Modules\Appointments\Database\Repositories\Contracts\WorkingScheduleRepository;
use Modules\Appointments\Http\Request\StoreAppointmentRequest;
use Modules\Appointments\Http\Request\UpdateScheduleRequest;

final class AppointmentController
{
    public function __construct(
        private WorkingScheduleRepository $workingScheduleRepository,
        private SlotGenerator $slotGenerator,
    ) {
    }

    /**
     * Create new Appointment
     */
    public function store(StoreAppointmentRequest $request): JsonResponse
    {
        $appointment = dispatch_sync(new CreateAppointment(
            $request->validated()['user_id'],
            $request->toDto(),
            $request->boolean('ignore_availability'),
        ));

        return response()->json($appointment, Response::HTTP_CREATED);
    }

    /**
     * Update the weekly schedule for admin (0-6).
     */
    public function updateSchedule(UpdateScheduleRequest $request, int $dayOfWeek): JsonResponse
    {
        return response()->json(dispatch_sync(new UpdateWorkingSchedule(
                $request->user_id,
                $dayOfWeek,
                $request->validated()
            ))
        );
    }

    /**
     * Checking a specific datetime range is open
     */
    public function checkSchedule(Request $request): JsonResponse
    {
        return response()->json($this->workingScheduleRepository->isWithinWorkingSchedule(
                $request->user_id,
                Carbon::parse($request->start),
                Carbon::parse($request->end)
            ));
    }

    /**
     * Checking available slots to generate
     */
    public function availableSlots(Request $request): JsonResponse
    {
        return response()->json(
            $this->slotGenerator->generate(
                (int) $request->query('user_id'),
                Carbon::parse($request->query('date'))
        ));
    }
}
