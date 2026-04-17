<?php

declare(strict_types=1);

namespace Modules\Appointments\Http\Request;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Core\Calendar\Dto\GoogleCalendarDto;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_time' => ['required', 'date', 'after:now'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'attendees' => ['nullable', 'array'],
            'timezone' => ['nullable', 'string'],
            'ignore_availability' => ['nullable', 'boolean'],
        ];
    }

    public function toDto(): GoogleCalendarDto
    {
        return new GoogleCalendarDto(
            title: $this->validated('title'),
            description: $this->validated('description'),
            startTime: Carbon::parse($this->validated('start_time')),
            endTime: Carbon::parse($this->validated('end_time')),
            attendees: $this->validated('attendees', []),
            timezone: $this->validated('timezone', 'UTC')
        );
    }
}
