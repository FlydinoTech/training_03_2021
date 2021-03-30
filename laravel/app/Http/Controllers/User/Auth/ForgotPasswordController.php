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
    public function findEmail(Request $request)
    {
        $user = $this->forgotPasswordService->findEmail($request->email);

        if (!$user) {
            return 'false';
        }
        $dataUser = [
            'remember_token' => bcrypt(rand(1000, 9999) . time()),
        ];
        $this->forgotPasswordService->updateUser($user->id,$dataUser);

        return $user->id;
    }
    //
    public function verifyForgotPassWord(Request $request)
    {
        $user = $this->forgotPasswordService->findEmail($request->email);

        if ($request->getMethod() == 'POST' && trim($user->remember_token)) {
            $dataUser = [
                'remember_token' => '',
            ];
            $this->forgotPasswordService->updateUser($user->id,$dataUser); 
            $code = rand(1000, 9999);
            $this->forgotPasswordService->sendMail($code,$request->email);

            return view('user.auth.verifyForgotPassWord', compact(['request', 'code']));
        }

        return view('user.auth.forgotPassword');
    }
    public function newPassword(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $user = $this->forgotPasswordService->findEmail($request->email);
            $newPW =  rand(100000, 999999);
            $dataUser = [
                'password' => bcrypt($newPW),
            ];
            $this->forgotPasswordService->updateUser($user->id,$dataUser);

            return redirect()->route('user.auth.login')->with('newPW', $newPW);
        }

        return redirect()->route('user.home');
    }
}
