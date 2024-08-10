<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "product_category_id" => "sometimes",
            "name" => "sometimes|string",
            "price" => "sometimes|numeric|min:0",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            "price.min" => "price must be greater than 0",
            "price.numeric" => "price must be numeric",
            "image.image" => "image must be an image",
            "image.mimes" => "image must be a jpeg,png,jpg,gif",
            "image.max" => "image must be less than 2MB",
        ];
    }
}
