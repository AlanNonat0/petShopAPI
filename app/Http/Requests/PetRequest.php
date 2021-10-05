<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pet;
class PetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name' => "required|max:40",
            'age' => "required|numeric",
            'animal' => "required|exists:animal_types,id|integer",
            'breed' => "required",
            'owner' => "required|exists:owners,id|integer"
        ];
    }

    public function messages(){
        return [
            "integer" => "Field :attribute must be numeric",
            "required" => "The field :attribute is required",
            "name.max" => "The pet name field must have a maximum of 40 characters",
            "animal.exists" =>"The type of animal not found",
            "owner.exists" =>"Unregistered owner",
        ];
    }
}
