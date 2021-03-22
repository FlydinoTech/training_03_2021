<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        echo 'Trang quản trị Admin: ' . $admin->name;
    }
}
