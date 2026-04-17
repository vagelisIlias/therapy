<?php

declare(strict_type=1);

namespace Modules\Appointments\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start_time' => ['required_if:is_open,true', 'date_format:H:i:s', 'nullable'],
            'end_time'   => ['required_if:is_open,true', 'date_format:H:i:s', 'after:start_time', 'nullable'],
            'is_open'    => ['required', 'boolean'],
        ];
    }
}
