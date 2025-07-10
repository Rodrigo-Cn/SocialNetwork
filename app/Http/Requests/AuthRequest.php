<?php

namespace App\Http\Requests;

use App\Support\ValidationMessages;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email|ends_with:@gmail.com,@yahoo.com,@hotmail.com',
            'password' => 'required|string|min:4|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => ValidationMessages::REQUIRED,
            'email.email' => ValidationMessages::EMAIL,
            'email.exists' => ValidationMessages::EXISTS,
            'email.ends_with' => ValidationMessages::ENDS_WITH,
            'password.required' => ValidationMessages::REQUIRED,
            'password.min' => ValidationMessages::MIN,
            'password.max' => ValidationMessages::MAX,
            'password.string' => ValidationMessages::STRING,
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'e-mail',
            'password' => 'senha'
        ];
    }
}
