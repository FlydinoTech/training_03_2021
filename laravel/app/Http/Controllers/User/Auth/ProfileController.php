<?php

namespace App\Http\Controllers\User\Auth;

use App\Services\User\Auth\ProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    //
    public function profile()
    {
        $user = Auth::user();

        return view('user.auth.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('user.auth.editProfile', compact('user'));
    }
    
    public function smEditProfile(Request $request)
    {
        $id = Auth::user()->id;
        $this->profileService->editProfile($id, $request);

        return redirect()->route('user.auth.profile')->with('msg', 'Sửa thông tin thành công !');
    }
}
