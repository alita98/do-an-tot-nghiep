<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MajorRequest extends FormRequest
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
        $formRules = [
            "name" => [
                "required",
                Rule::unique('majors')->ignore($this->id)
            ]     
        ];
        return $formRules;
    }

    public function messages(){   
        $message = [
            'name.required' => 'Hãy nhập tên chuyên ngành',
            'name.unique' => 'Tên đã tồn tại',
        ];
        return $message;
    }
}
