<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
        return view('user.auth.forgotPassword');
    }
    //
    public function findEmail(Request $re){
        $user = User::where('email',$re->email)->first();
      
       
        if(!empty($user)){
          
           
            $upUser = User::find($user->id);
            $upUser->remember_token = bcrypt(rand(1000,9999).time());
            $upUser->save();
            return $user->id;
        }else{
            return 'false';
        }
    }
    //
    public function verifyForgotPassWord(Request $re){
        $user = User::where('email',$re->email)->first();
        
        if($re->getMethod()=='POST' && !empty(trim($user->remember_token))){
            $upUser = User::find($user->id);
            $upUser->remember_token = '';
            $upUser->save();
        $code = rand(1000,9999);
        $details = [
        
            'code' => $code,
        ];
         $infoUser = User::where('email', $re->email)->first();
         $to_email = $infoUser->email;
         $to_fullname = $infoUser->name;
         Mail::send('mail.user.verify', $details, function ($message) use ($to_email, $to_fullname) {
             $message->to($to_email, $to_fullname)->subject('Mã xác nhận mật khẩu');
             $message->from('minhlamtestsendmail@gmail.com', 'FLYDINO');
         });
         
        return view('user.auth.verifyForgotPassWord',compact(['re','code']));

            
        }
        return view('user.auth.forgotPassword');
        
    }
    public function newPassword(Request $re){
        if($re->getMethod()=='POST'){
            $id = User::where('email', $re->email)->first()->id;
            $newPW =  rand(100000,999999);
            $user = User::find($id);
            $user->password = bcrypt($newPW);
            $user->save();
            
            return redirect()->route('login')->with('newPW',$newPW);   
        }
        return redirect()->route('home');   
    }
}