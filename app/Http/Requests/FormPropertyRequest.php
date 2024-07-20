<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPropertyRequest extends FormRequest
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
            'title' => 'required|string|min:4',
            'description' => 'required|string|min:4',
            'surface' => 'required|integer',
            'rooms' => 'required|integer',
            'bedrooms'  => 'required|integer',
            'floor'  => 'required|integer',
            'price'  => 'required|integer',
            'city'  => 'required|string',
            'address'  => 'required|string',
            'postal_code'  => 'required|string',
            'sold'  => 'nullable|boolean',
            //'imageName' => 'image|max:10000'
        ];
    }
}
