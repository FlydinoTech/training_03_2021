<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'confirm' => 'same:password',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập họ tên',
            'email.required' => 'Nhập email đăng ký',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'confirm.same' => 'Mật khẩu không khớp! Vui lòng nhập lại.',
            'role.required' => 'Chọn vai trò'
        ];
    }
}
