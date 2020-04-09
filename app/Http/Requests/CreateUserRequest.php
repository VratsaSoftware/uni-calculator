<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required|unique:users|min:2',
            'password' => 'required|min:2',
            'email' => 'required|unique:users,email|min:2', 
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'role_id' => 'required',
        ];
    }

    public function messages(){
        return[
            'username.required' => 'Потребителското име е задължително! ',
            'username.unique' => 'Това потребителското има вече е заето!',
            'username.min' => 'Името да не е по-малко от 2 знака! ',
            'password.required' => 'Паролата е задължителна!',
            'password.min' => 'Паролата да е поне 2 знака!',
            'email.required' => 'Моля, посочете email адрес!',
            'email.unique' => 'Този email адрес вече е зает!',
            'email.min' => 'Email адресът да е поне 2 знака!',
            'first_name.required' => 'Моля, попълнете Вашето име!',
            'first_name.min' => 'Вашето име да е поне 2 знака!',
            'last_name.required' => 'Моля, попълнете Вашата фамилия!',
            'last_name.min' => 'фамилията да е поне 2 знака!',
        ];
    }
}
