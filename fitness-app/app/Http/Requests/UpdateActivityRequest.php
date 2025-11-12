<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Complex validation rules for extra credit.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => ['required', 'date', 'before_or_equal:today'],
            'time_start' => ['nullable', 'date_format:H:i'],
            'time_end' => ['nullable', 'date_format:H:i', 'after_or_equal:time_start'],
            'activity' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z0-9\s\-_]+$/'],
            'time_spent' => ['nullable', 'string', 'max:50'],
            'distance' => ['nullable', 'string', 'max:50'],
            'set_count' => ['nullable', 'integer', 'min:0', 'max:100'],
            'reps' => ['nullable', 'integer', 'min:0', 'max:10000'],
            'note' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'date.before_or_equal' => 'The date cannot be in the future.',
            'time_end.after_or_equal' => 'The end time must be after or equal to the start time.',
            'activity.required' => 'The activity name is required.',
            'activity.max' => 'The activity name may not be greater than 255 characters.',
            'activity.min' => 'The activity name must be at least 2 characters.',
            'activity.regex' => 'The activity name may only contain letters, numbers, spaces, hyphens, and underscores.',
            'set_count.max' => 'The number of sets cannot exceed 100.',
            'reps.max' => 'The number of reps cannot exceed 10,000.',
            'note.max' => 'The note may not be greater than 1000 characters.',
        ];
    }
}
