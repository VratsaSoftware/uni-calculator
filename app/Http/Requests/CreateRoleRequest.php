<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|unique:roles|min:2',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Името на ролята е задължително! ',
            'name.min' => 'Името да не е по-малко от 2 знака! ',
            'name.unique' => 'Въведената от Вас роля вече съществува в базата данни!'
        ];
    }
}
