<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
        ];
    }
}