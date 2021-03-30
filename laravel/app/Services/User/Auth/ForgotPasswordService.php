<?php

namespace App\Services\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordService
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findEmail($email)
    {
        return $this->model::where('email', $email)->first();
    }

    public function updateUser($idUser, $dataUSer = [])
    {
        return $this->model::where('id',$idUser)->update($dataUSer);
    }

    public function sendMail($code,$email)
    {
        $details = [
            'code' => $code,
        ];

        $infoUser =  $this->findEmail($email);
        $to_email = $infoUser->email;
        $to_fullname = $infoUser->name;

        Mail::send('mail.user.verify', $details, function ($message) use ($to_email, $to_fullname) {
            $message->to($to_email, $to_fullname)->subject('Mã xác nhận mật khẩu');
            $message->from('minhlamtestsendmail@gmail.com', 'FLYDINO');
        });
    }

}
