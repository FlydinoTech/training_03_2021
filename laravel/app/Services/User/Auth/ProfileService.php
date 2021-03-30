<?php 

namespace App\Services\User\Auth;

use App\Models\User;

class ProfileService
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function editProfile($idUser,$dataUser)
    {
        $user = $this->model::find($idUser);
        $user->name = $dataUser->name;
        //$user->email = $re->email;
        $user->phone = $dataUser->phone;
        $user->address = $dataUser->address;
        if (!empty($dataUser->password)) $user->password = bcrypt($dataUser->password);

        return $user->save();
    }
}

?>