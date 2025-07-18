<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Support\ValidationMessages;

class UserCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:4|max:70|string',
            'date_birth' => 'required|date',
            'job' => 'required|min:4|max:50|string',
            'email' => 'required|email|unique:users,email|ends_with:@gmail.com,@yahoo.com,@hotmail.com',
            'password' => 'required|string|min:4|max:50',
            'username' => 'required|min:4|max:50|string|unique:users,username',
            'phonenumber' => 'nullable|string|min:8|max:13|unique:users,phonenumber',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ValidationMessages::REQUIRED,
            'name.min' => ValidationMessages::MIN,
            'name.max' => ValidationMessages::MAX,
            'name.string' => ValidationMessages::STRING,
            'date_birth.required' => ValidationMessages::REQUIRED,
            'date_birth.date' => ValidationMessages::DATE,
            'job.required' => ValidationMessages::REQUIRED,
            'job.min' => ValidationMessages::MIN,
            'job.max' => ValidationMessages::MAX,
            'job.string' => ValidationMessages::STRING,
            'email.required' => ValidationMessages::REQUIRED,
            'email.email' => ValidationMessages::EMAIL,
            'email.unique' => ValidationMessages::UNIQUE,
            'email.ends_with' => ValidationMessages::ENDS_WITH,
            'password.required' => ValidationMessages::REQUIRED,
            'password.min' => ValidationMessages::MIN,
            'password.max' => ValidationMessages::MAX,
            'password.string' => ValidationMessages::STRING,
            'username.required' => ValidationMessages::REQUIRED,
            'username.min' => ValidationMessages::MIN,
            'username.max' => ValidationMessages::MAX,
            'username.string' => ValidationMessages::STRING,
            'username.unique' => ValidationMessages::UNIQUE,
            'phonenumber.string' => ValidationMessages::STRING,
            'phonenumber.min' => ValidationMessages::MIN,
            'phonenumber.max' => ValidationMessages::MAX,
            'phonenumber.unique' => ValidationMessages::UNIQUE,
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'date_birth' => 'data de nascimento',
            'job' => 'trabalho',
            'email' => 'e-mail',
            'password' => 'senha',
            'username' => 'nome de usuário',
            'phonenumber' => 'telefone',
        ];
    }

    public function wantsJson()
    {
        return true;
    }

}
