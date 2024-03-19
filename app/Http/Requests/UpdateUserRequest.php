<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,'.$this->id,
            'first_surname' => 'required|max:255',
            'second_surname' => 'max:255',
            'password' => 'nullable'
        ];
    }
}
