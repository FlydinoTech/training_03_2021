<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $listCourse = Course::paginate(6);
       
        //echo 'Xin chào User, '. $user->name;
        return view('layouts.user.inc.home',compact(['user','listCourse']));
    }

    public function search(Request $re){
        $user = Auth::user();
        $listCourse = Course::where('name','like','%'.$re->search.'%')->paginate(6);
        return view('layouts.user.inc.home',compact(['user','listCourse']));
    }
}
