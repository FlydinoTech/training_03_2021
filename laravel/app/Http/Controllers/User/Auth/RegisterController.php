<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterUserRequest;
use App\Services\User\Auth\RegisterService;


class RegisterController extends Controller
{
    //
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function verify(RegisterUserRequest $request)
    {
        if ($request->getMethod() == 'GET') {
            return redirect()->back();
        }

        //sendmail
        $code = rand(1000, 9999);
        $this->registerService->sendMail($code,$request);

        return view('user.auth.verifyRegister', compact(['request', 'code']));
    }

    public function smRegister(Request $request)
    {
        $data = json_decode($request->data, true);

        return $this->registerService->submitRegister($data);
        
    }
}
