<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMajorsRequest extends FormRequest
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
            'form' => 'required|min:2',
            'max_score' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Името на специалността е задължително!',
            'name.min' => 'Името да не е по-малко от 2 знака',
            'form.required' => 'Формата на специалността се попълва задължително!',
            'form.min' => 'Името да не е по-малко от 2 знака',
            'max_score.required' => 'Максималният бал e задължителен!'
        ];
    }
}
