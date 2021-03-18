<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

class ForgetController extends Controller
{
    public function forget()
    {
        return view('admin.auth.forget');
    }

    public function postForget(Request $request)
    {
        $objAdmin = Admin::where('email', $request->email)->first();
        if (!$objAdmin) {
            return redirect()->back()->with('error', 'Email không tồn tại trên hệ thống.');
        }

        $to_email = $objAdmin->email;
        $to_fullname = $objAdmin->fullname;
        $code = bcrypt(rand(1, 100) . time());
        $data = array(
            'link' => route('admin.reset') . '?code=' . $code . '&email=' . $request->email,
        );

        Admin::where('email', $request->email)->update(['reset_token' => $code]);
        Mail::send('mail.admin.reset', $data, function ($message) use ($to_email, $to_fullname) {
            $message->to($to_email, $to_fullname)->subject('Gửi mã đặt lại mật khẩu');
            $message->from('minhlamtestsendmail@gmail.com', 'FLYDINO');
        });
        
        return redirect()->route('admin.login')->with('msg', 'Gửi yêu cầu đặt lại mật khẩu thành công! Vui lòng kiểm tra email của bạn.');
    }
}
