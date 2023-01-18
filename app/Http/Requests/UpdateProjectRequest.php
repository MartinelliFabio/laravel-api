<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'name_proj' => ['required', Rule::unique('projects')->ignore($this->project)],
            'description' => ['nullable'],

            'dev_framework' => ['nullable'],
            'team' => ['nullable'],
            'link_git' => ['nullable'],
            'lvl_dif' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'max:1000'],
            'type_id' => ['required', 'exists:types,id'],

        ];
    }
}