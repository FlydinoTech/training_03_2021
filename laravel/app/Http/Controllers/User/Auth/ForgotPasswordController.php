<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Services\User\Auth\ForgotPasswordService;
// use App\Models\User;
use Illuminate\Http\Request;
class ForgotPasswordController extends Controller
{
    protected $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }

    public function forgotPassword()
    {
        return view('user.auth.forgotPassword');
    }
    //
    public function checkEmail(Request $request)
    {
        $user = $this->forgotPasswordService->checkEmail($request);
       
        return $user;
    }
    //
    public function verifyForgotPassWord(Request $request)
    {
        $user = $this->forgotPasswordService->findEmail($request->email);

        if ($request->getMethod() == 'POST' && trim($user->remember_token)) {
         
           $code =  $this->forgotPasswordService->verifyForgotPassWord($request,$user->id);

            return view('user.auth.verifyForgotPassWord', compact(['request', 'code']));
        }

        return view('user.auth.forgotPassword');
    }
    public function newPassword(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $newPW = $this->forgotPasswordService->newPassword($request);

            return redirect()->route('user.auth.login')->with('newPW', $newPW);
        }

        return redirect()->route('user.home');
    }
}
