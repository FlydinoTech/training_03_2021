<?php

namespace App\Services\User\Auth;

use App\Services\User\Auth\BaseService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordService extends BaseService
{
    //private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findEmail($email)
    {
        return $this->model::where('email', $email)->first();
    }

    public function checkEmail($request)
    {
        $user = $this->findEmail($request->email);

        if (!$user) {
            return 'false';
        }

        $dataUser = [
            'remember_token' => bcrypt(rand(1000, 9999) . time()),
        ];

        $this->updateUser($user->id, $dataUser);

        return $user->id;
    }

    public function verifyForgotPassWord($request, $userId)
    {
        $dataUser = [
            'remember_token' => '',
        ];
        $this->updateUser($userId, $dataUser);
        $code = rand(1000, 9999);
        $this->sendMail($code, $request->email);

        return $code;
    }

    public function newPassword($request)
    {
        $user = $this->findEmail($request->email);
        $newPW =  rand(100000, 999999);
        $dataUser = [
            'password' => bcrypt($newPW),
        ];
        $this->updateUser($user->id, $dataUser);

        return $newPW;
    }

    public function updateUser($idUser, $dataUSer = [])
    {
        return $this->model::where('id', $idUser)->update($dataUSer);
    }

    public function sendMail($code, $email)
    {
        $details = [
            'code' => $code,
        ];

        $infoUser =  $this->findEmail($email);
        $to_email = $infoUser->email;
        $to_fullname = $infoUser->name;

        return Mail::send('mail.user.verify', $details, function ($message) use ($to_email, $to_fullname) {
            $message->to($to_email, $to_fullname)->subject('Mã xác nhận mật khẩu');
            $message->from(config('mail.user.email'), config('mail.user.sendname'));
        });
    }
}
