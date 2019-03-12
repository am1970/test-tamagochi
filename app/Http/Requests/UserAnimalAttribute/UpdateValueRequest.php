<?php

namespace App\Http\Requests\UserAnimalAttribute;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateValueRequest
 *
 * Properties
 * @property boolean $is_full
 */
class UpdateValueRequest extends FormRequest
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
            'is_full' => 'required|boolean'
        ];
    }
}
