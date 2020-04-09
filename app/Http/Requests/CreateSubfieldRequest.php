<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubfieldRequest extends FormRequest
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
            'name' => 'required|min:2',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Името на поднаправлението е задължително! ',
            'name.min' => 'Името да не е по-малко от 2 знака! ',
        ];
    }
}
