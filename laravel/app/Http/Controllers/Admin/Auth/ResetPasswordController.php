<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\ResetPasswordRequest;
use App\Services\Admin\Auth\ResetPasswordService;
use App\Models\Admin;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }


    public function formSendEmailConfirmationCode()
    {
        return view('admin.auth.password.forgot');
    }

    public function sendEmailConfirmationCode(Request $request)
    {
        if ($this->resetPasswordService->sendEmailConfirmationCode($request->email)) {

            return redirect()->route('admin.login')->with('success', config('message.forgot.success'));
        }

        return redirect()->back()->with('error', config('message.forgot.error'));
    }

    public function formResetPassword(Request $request)
    {
        if ($this->resetPasswordService->checkCodeReset($request->email, $request->code)) {
            return view('admin.auth.password.reset');
        }

        return redirect()->route('admin.login');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if ($this->resetPasswordService->resetPassword(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.login')->with('success', config('message.resetPassword.success'));
        }
    }
}
