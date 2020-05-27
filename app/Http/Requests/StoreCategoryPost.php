<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'nullable|file|image|mimes:jpeg,png',
            'title' => 'required|max:20',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Input Title.',
            'title.unique'          => 'This Title already exist.',
            'title.max'             => 'Input Title less than 20 characters.',
            'description.required'  => 'Input Description.',
            'description.max'       => 'Input Description less than 255 characters.',
        ];
    }
}
