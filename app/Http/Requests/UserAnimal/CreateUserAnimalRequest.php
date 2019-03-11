<?php

namespace App\Http\Requests\UserAnimal;

use App\Rules\maxOneAnimalOfUser;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserAnimalRequest extends FormRequest
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
//            'animal_id' => [ 'required', 'integer', 'exists:animals,id', new maxOneAnimalOfUser()],
            'name' => 'required|string|max:64'
        ];
    }
}
