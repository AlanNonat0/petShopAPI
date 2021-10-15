<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
        $rules = [
            "name" => "required|min:3|max:40",
            "telephone" => "required|unique:owners,telephone,{$this->id}|min:8|max:11"
        ];

        return $this->verifyMethod($rules);
    }

    public function messages()
    {
        return [
        "required" => "The field :attribute is required",
        "unique" => "The :attribute already exists",
        "name.min" => "The name field needs at least 3 characters",
        "name.max" => "The name field must have a maximum of 40 characters",
        "telephone.min" => "The telephone field needs at least 8 characters",
        "telephone.max" => "The telephone field must have a maximum of 11 characters",

        ];
    }
}
