<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('user.auth.profile',compact('user'));
    }
    public function editProfile(){
       
         $user = Auth::user();
            return view('user.auth.editProfile',compact('user'));
    
    }
    public function smEditProfile(Request $re){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $re->name;
        //$user->email = $re->email;
        $user->phone = $re->phone;
        $user->address = $re->address;
        if(!empty($re->password))$user->password = bcrypt($re->password);
        $user->save();
        return redirect()->route('profile')->with('msg','Sửa thông tin thành công !');
    }
}