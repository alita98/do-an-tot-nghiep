<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
                Rule::unique('departments')->ignore($this->id)
            ],   
            'file_upload' => [
                "mimes:jpg,png"
            ],    
            'information' => [
                "required"
            ],       
        ];
        return $formRules;
    }

    public function messages(){   
        $message = [
            'name.required' => 'Hãy nhập tên phòng ban',
            'name.unique' => 'Tên đã tồn tại',
            'file_upload.required' => 'Hãy chọn ảnh cho phòng ban',
            'file_upload.mimes' => 'Ảnh không đúng định dạng',
            'information.required' => 'Hãy nhập thông tin phòng ban',
        ];
        return $message;
    }
}
