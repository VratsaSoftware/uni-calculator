<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulaRequest extends FormRequest
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

            'coefficient.*' => 'required|numeric',
            'grade.*' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'coefficient.*.required' => 'Задължителен коефициент!!!',
            'coefficient.*.numeric' => 'Коефициента трябва да е число !!!',
            
            'grade.*.required' => 'Задължителена максимална стойност!!!',
            'grade.*.numeric' => 'Максималната стойност трябва да е число!!!',
        ];
    }
}
