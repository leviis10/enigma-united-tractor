<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email",
            "email.unique" => "Email already exists",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 8 characters",
        ];
    }
}
