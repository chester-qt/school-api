<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:students'],
            'phone' => ['sometimes', 'string', 'max:255',],
            'address' => ['sometimes', 'string', 'max:255'],
            'enrolled' => ['sometimes', 'boolean'],
            'date_of_birth' => ['sometimes', 'date'],
            'department_id' => ['sometimes', 'exists:departments,id'],
        ];
    }
}
