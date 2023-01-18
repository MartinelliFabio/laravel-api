<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name_proj' => 'required|unique:projects|max:150|min:3',
            'description' => 'nullable',

            'dev_framework' => 'nullable',
            'team' => 'nullable',
            'link_dif' => 'nullable',
            'lvl_git' => 'nullable',
            'cover_image' => 'nullable|image|max: 250',
            'type_id' => 'required|exists:types,id',

        ];
    }
    public function messages()
    {
        return [
            'name_proj.required' => 'Il titolo è obbligatorio.',
            'name_proj.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'name_proj.max' => 'Il titolo non può superare i :max caratteri.',
            'name_proj.unique:projects' => 'Il titolo esiste già',

            'type_id.required' => 'il campo e richiesto'


        ];
    }
}

// return [
//     'name_proj' => 'require|unique:project|max:100',
//     'description' => 'nullable',
//     'dev_lang' => 'require|max:255',
//     'dev_framework' => 'nullable',
//     'team' => 'nullable',
//     'lvl_dif' => 'required|max:10!min:1',
//     'link_git' => 'nullable',

// ];