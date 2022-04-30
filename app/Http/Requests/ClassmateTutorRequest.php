<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassmateTutorRequest extends FormRequest
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
            'image' => [
                "mimes:jpg,png"
            ],    
            'information' => [
                "required"
            ],  
            'link' => [
                "required"
            ], 
            'date' => [
                "required"
            ],  
            'start_time' => [
                "required"
            ],
            'end_time' => [
                "required"
            ],    
        ];
        return $formRules;
    }

    public function messages(){   
        $message = [
            'name.required' => 'Hãy nhập tên lớp học',
            'name.unique' => 'Tên đã tồn tại',
            'file_upload.required' => 'Hãy chọn ảnh cho lớp học',
            'file_upload.mimes' => 'Ảnh không đúng định dạng',
            'information.required' => 'Hãy nhập thông tin lớp học',
            'link.required' => 'Hãy nhập link phòng học',
            'date.required' => 'Hãy chọn ngày học',
            'start_time.required' => 'Hãy chọn thời gian bắt đầu',
            'end_time.required' => 'Hãy chọn thời gian kết thúc'
        ];
        return $message;
    }
}
