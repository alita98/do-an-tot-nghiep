<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassmateRequest extends FormRequest
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
            ],
            "number" => [
                "required",
            ],
            "information" => [
                "required",
            ] 
        ];
        return $formRules;
    }

    public function messages(){   
        $message = [
            'name.required' => 'Hãy nhập tên môn học',
            'name.unique' => 'Tên đã tồn tại',
            'number.required' => 'Hãy nhập số buổi học dự kiến',
            'information.required' => 'Hãy nhập thông tin môn học',
            // 'file_upload.required' => 'Hãy chọn ảnh cho phòng ban',
            // 'file_upload.mimes' => 'Ảnh không đúng định dạng',
        ];
        return $message;
    }
}
