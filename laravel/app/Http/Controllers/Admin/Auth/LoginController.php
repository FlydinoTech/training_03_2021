<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->remember;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('admin.home.index');
        } else {
            return redirect()->back()->with('error', config('message.login.error'));
        }
    }
}
