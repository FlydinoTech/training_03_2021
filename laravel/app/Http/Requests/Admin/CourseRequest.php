<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'tuition' => 'integer',
            'time' => 'required',
            'desc' => 'required',
            'detail' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập tên khóa học',
            'tuition.integer' => 'Vui lòng nhập học phí là số nguyên',
            'time.required' => 'Nhập thời gian đào tạo khóa học',
            'desc.required' => 'Nhập mô tả khóa học',
            'detail.required' => 'Nhập chi tiết khóa học'
        ];
    }
}
