<?php

namespace App\Http\Requests;

use App\Constants\PostConstants;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'content_type' => ['required','in:'.implode(',',PostConstants::CONTENT_TYPE_LIST)],
            'category_id' => 'required|exists:categories,id',
            'donate_link' => 'nullable|sometimes|url',
            'highlighting' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
