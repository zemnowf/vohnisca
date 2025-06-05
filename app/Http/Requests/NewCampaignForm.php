<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCampaignForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:128"],
            "description" => ["string", "nullable"],
            "short_description" => ["string", "nullable"],
            "preview_image" => ["image", "nullable"],
            "user_id" => ["required", "integer", "exists:users,id"],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            "user_id" => auth()->id(),
        ]);
    }
}
