<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Support\ValidationMessages;

class UserPersistProfileImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable|image|mimes:png,jpg|max:5120']
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => ValidationMessages::IMAGE,
            'image.mimes' => ValidationMessages::MIMES,
            'image.max' => ValidationMessages::MAX
        ];
    }
}
