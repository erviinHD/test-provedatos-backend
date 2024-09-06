<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'code' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'observation' => 'nullable|string',
            'date_start' => 'required|date',
            'role' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'province_work' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'part_time' => 'required|boolean',
            'observation_work' => 'nullable|string',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
