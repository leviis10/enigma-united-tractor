<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
      "email" => "sometimes|email",
      "password" => "required|min:8",
    ];
  }

  public function messages()
  {
    return [
      "email.email" => "Email is not valid",
      "password.required" => "Password is required",
      "password.min" => "Password must be at least 8 characters",
    ];
  }
}
