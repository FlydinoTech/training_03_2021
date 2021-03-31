<?php

namespace App\Services\Admin\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Mail;


class ResetPasswordService
{
    private $model;

    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    public function sendEmailConfirmationCode($email)
    {
        $infoAdmin = $this->model->where('email', $email)->first();

        if ($infoAdmin) {

            $code = bcrypt(rand(100, 999));
            $toEmail = $infoAdmin->email;
            $toName = $infoAdmin->fullname;
            $data = array(
                'link' => route('admin.reset') . '?code=' . $code . '&email=' . $toEmail,
            );

            Mail::send('admin.auth.password.mailSend', $data, function ($message) use ($toEmail, $toName) {
                $message->to($toEmail, $toName)->subject('Gửi mã đặt lại mật khẩu');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });

            $this->model->where('email', $infoAdmin->email)->update(['reset_token' => $code]);

            return true;
        }

        return false;
    }

    public function checkCodeReset($email, $code)
    {
        return $this->model->where('email', $email)->where('reset_token', $code)->exists();
    }

    public function resetPassword($params)
    {
        return $this->model->where('email', $params['email'])
            ->update([
                'password' => bcrypt($params['password']),
                'reset_token' => null,
                'remember_token' => null,
            ]);
    }
}
