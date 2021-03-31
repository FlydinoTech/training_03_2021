<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $stopOnFirstFailure = true;
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
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'unique' => ':attribute Đã tồn tại',
            'email' => ':attribute Không đúng định dạng',
            'integer' => ':attribute Chỉ được nhập số',
        ];
    }
    public function attributes()
    {
        return [
            'phone' => 'Số điện thoại'
        ];
    }
}
