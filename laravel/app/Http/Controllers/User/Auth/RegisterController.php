<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    //
    public function register(){
        
        return view('user.auth.register');
    }

    public function verify(Request $re){
        if($re->getMethod() =='GET'){
            return redirect()->back();
        }
        
        
        //sendmail
        $this->validate($re,
        [
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
        ],

        [
            'required' => ':attribute Không được để trống',
            'unique' => ':attribute Đã tồn tại',
            'email' => ':attribute Không đúng định dạng',
            'integer' => ':attribute Chỉ được nhập số',
        ],

        [
        
            'phone' => 'Số điện thoại',
        ]

    );
    $code = rand(0,9999);
        $details = [
            
            'code' => $code,
        ];
        //$infoUser = User::where('email', $re->email)->first();
        $to_email = $re->email;
        $to_fullname = $re->name;
        Mail::send('mail.user.verify', $details, function ($message) use ($to_email, $to_fullname) {
            $message->to($to_email, $to_fullname)->subject('Mã xác nhận mật khẩu');
            $message->from('minhlamtestsendmail@gmail.com', 'FLYDINO');
        });
    
     
        return view('user.auth.verify',compact(['re','code']));
    }
    public function smRegister(Request $re){
        
        $data = json_decode($re->data,true);
        $infoUser = User::where('email', $data['email'])->first();
        if(empty($infoUser)){
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['adress'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect()->route('login')->with('successReU','Đăng ký thành công!');
    }else{
        return redirect()->route('register')->with('msg','Tài khoản đã được tạo!');
    }
    }

}