<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ResetController extends Controller
{
    public function reset(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        $checkAdmin = Admin::where('email', $email)->where('reset_token', $code)->first();
        if ($checkAdmin) {
            return view('admin.auth.reset', compact('email'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function postReset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'confirm' => 'same:password'
        ], [
            'password.required' => 'Nhập mật khẩu mới',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'confirm.same' => 'Mật khẩu không trùng khớp'
        ]);

        $data = array(
            'password' => bcrypt($request->password),
            'remember_token' => null,
            'reset_token' => null
        );

        $result = Admin::where('email', $request->email)->update($data);
        if ($result == true) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('msg', 'Thay đổi mật khẩu thành công! Đăng nhập lại.');
        }
    }
}
