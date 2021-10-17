<?php

namespace App\Http\Requests;

use App\Models\Pet;
use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{

    use VerifyRules;

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

        $rules = [
            'name' => "required|max:40",
            'age' => "required|numeric",
            'animal_type_id' => "required|exists:animal_types,id|integer",
            'breed' => "required",
            'owner_id' => "required|exists:owners,id|integer",
            'id' => "required|numeric"
        ];

        return $this->verifyMethod($rules);
    }

    public function messages(){
        return [
            "integer" => "Field :attribute must be numeric",
            "id.numeric" => "The parameter :attribute in the url must be numeric",
            "required" => "The field :attribute is required",
            "name.max" => "The pet name field must have a maximum of 40 characters",
            "animal.exists" =>"The type of animal not found",
            "owner.exists" =>"Unregistered owner",
        ];
    }
}
