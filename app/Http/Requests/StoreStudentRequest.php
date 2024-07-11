<?php

namespace App\Http\Requests;

use App\Models\Student;
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'phone' => ['required', 'string', 'max:255',],
            'address' => ['required', 'string', 'max:255'],
            'enrolled' => ['required', 'boolean'],
            'date_of_birth' => ['required', 'date'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
    }

//    public function messages()
//    {
//        return [
//              'enrolled.boolean' => 'Type 1 or 0',
//        ];
//    }
}
