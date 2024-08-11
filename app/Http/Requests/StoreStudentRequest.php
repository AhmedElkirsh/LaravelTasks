<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
        $studentId = $this->route('student') ? $this->route('student')->id : null;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                "unique:students,email,{$studentId}",
            ],
            'gender' => 'required|string|in:male,female',
            'grade' => 'required|integer',
            'address' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'track_id' => 'required|exists:tracks,id',
        ];
    }

}