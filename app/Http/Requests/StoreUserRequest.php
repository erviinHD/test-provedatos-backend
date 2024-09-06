<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreUserRequest extends FormRequest
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
            'code' => 'string|max:255',
            'status' => 'string|max:255',
            'email' => 'required|string|email|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'date_birth' => 'required',
            'observation' => 'nullable',
            'date_start' => 'required',
            'role' => 'required|string|max:255',
            'department' =>  'required|string|max:255',
            'province_work'  => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'part_time' => 'required|boolean',
            'observation_work' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
