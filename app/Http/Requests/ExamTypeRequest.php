<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamTypeRequest extends FormRequest
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

            'name' => 'required|unique:exam_types,name|max:15',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Задължително име!!!',
            'name.unique' => 'Това име вече съществува!!!',
            'name.max' => 'Максимум 15 букви!!!',
        ];
    }
}
