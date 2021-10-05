<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalTypeRequest extends FormRequest
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
            "type" => "required|regex:/[a-zA-Z]/|min:3|max:40|unique:animal_types,type"
        ];
    }

    public function messages()
    {
        return [
            "type.required" => 'The type field is required',
            "type.max" => 'Maximum length of 40 characters',
            "type.min" => 'Minimum length of 3 characters',
            "type.unique" => 'The type of animal already exists',
            "type.regex" => 'only numbers are not allowed'
        ];
    }
}
