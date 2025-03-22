<?php

namespace App\Http\Requests\CourseCreate;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'seo_description' => 'required|string',
            'demo_video_storage' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'thumbnail' => 'required|image',
        ];
    }
}
