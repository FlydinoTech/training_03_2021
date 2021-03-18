<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'course_id' => 'required',
            'name' => 'required',
            'start' => 'required',
            'calendar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Chọn khóa học',
            'name.required' => 'Nhập niên khóa',
            'start.required' => 'Chọn ngày khai giảng',
            'calendar.required' => 'Nhập lịch học'
        ];
    }
}
