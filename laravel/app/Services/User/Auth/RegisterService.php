<?php 

namespace App\Services\User\Auth;

use App\Services\User\Auth\BaseService;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterService  extends BaseService
{
    //private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function sendMail($request)
    {
        $code = rand(1000, 9999);
        $details = [
            'code' => $code,
        ];

        $to_email = $request->email;
        $to_fullname = $request->name;

         Mail::send('mail.user.verify', $details, function ($message) use ($to_email, $to_fullname) {
            $message->to($to_email, $to_fullname)->subject('Mã xác nhận mật khẩu');
            $message->from(config('mail.user.email'), config('mail.user.sendname'));
        });

        return $code;
    }

    public function submitRegister($data)
    {
        $infoUser = $this->model->where('email', $data['email'])->first();

        if (!$infoUser) {
            $rememberToken = rand(1000, 9999).time();
            $data['password'] = bcrypt($data['password']);
            $data['remember_token'] = bcrypt($rememberToken);
        
            $this->model->create($data);

            return redirect()->route('user.auth.login')->with('successReU', 'Đăng ký thành công!');
        } else {
            
            return redirect()->route('user.auth.register')->with('msg', 'Tài khoản đã được tạo!');
        }
    }
}
?>