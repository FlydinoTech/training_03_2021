<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Mail\VerifyUserMail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register(){
        
        return view('user.auth.register');
    }
    public function verify(Request $re){
        $details = [
            'title' => 'Xác thực email',
            'body' => 'Mã xác thực: '. random()
        ];
        Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
        return view('user.auth.verify');
    }
}
