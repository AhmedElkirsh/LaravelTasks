<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'maxscore' => 'required|integer|min:100',
            'track_ids' => 'nullable|array', 
            'track_ids.*' => 'exists:tracks,id'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The course name is required.',
            'maxscore.required' => 'The maximum score is required.',
            'track_ids.array' => 'The selected tracks must be an array.',
            'track_ids.*.exists' => 'One or more selected tracks are invalid.',
        ];
    }
}
