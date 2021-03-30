<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('user.auth.login');
        }

        $credentials = $request->only(['email', 'password']);
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home');
        } else {            
            $error = 'lỗi';
            return redirect()->back()->with('msg', 'Sai thông tin đăng nhập hoặc mật khẩu');
        }
    }
}
