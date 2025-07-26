<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Support\ValidationMessages;

class PostCommunityCreateRequest extends FormRequest
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
            'description' => ['required', 'string', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
            'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/quicktime', 'max:51200'],
            'status'  => ['required', 'string', 'in:public,private'],
            'attached_url' => ['required', 'boolean'],
            'highlight' => ['required', 'boolean'],
            'location' => ['nullable', 'array'],
            'location.*.country' => ['nullable', 'string', 'min:2', 'max:70'],
            'location.*.state' => ['nullable', 'string', 'min:2', 'max:70'],
            'community_id' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => ValidationMessages::REQUIRED,
            'description.string' => ValidationMessages::STRING,
            'description.min' => ValidationMessages::MIN,
            'image.image' => ValidationMessages::IMAGE,
            'image.mimes' => ValidationMessages::MIMES,
            'image.max' => ValidationMessages::MAX_FILE,
            'video.file' =>  ValidationMessages::FILE,
            'video.mimetypes' =>  ValidationMessages::MIMETYPES,
            'video.max' => ValidationMessages::MAX_FILE,
            'status.required' => ValidationMessages::REQUIRED,
            'status.string' => ValidationMessages::STRING,
            'status.in' =>  ValidationMessages::IN,
            'attached_url.required' => ValidationMessages::REQUIRED,
            'attached_url.boolean' =>  ValidationMessages::BOOLEAN,
            'highlight.required' => ValidationMessages::REQUIRED,
            'highlight.boolean' =>  ValidationMessages::BOOLEAN,
            'location.array' =>  ValidationMessages::ARRAY,
            'location.*.country.string' => ValidationMessages::STRING,
            'location.*.country.min' => ValidationMessages::MIN,
            'location.*.country.max' => ValidationMessages::MAX,
            'location.*.state.string' => ValidationMessages::STRING,
            'location.*.state.min' => ValidationMessages::MIN,
            'location.*.state.max' => ValidationMessages::MAX,
            'community_id.required' => ValidationMessages::REQUIRED,
            'community_id.integer' => ValidationMessages::INTEGER,
        ];
    }

    public function attributes(): array
    {
        return [
            'description' => 'descrição',
            'highlight' => 'destaque',
            'location' => 'localização',
            'location.*.country' => 'país',
            'location.*.state' => 'estado',
        ];
    }
}
