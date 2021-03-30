<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\User\Course\CourseService;
use Config;

class IndexController extends Controller
{
    protected $course;
    public function __construct(CourseService $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $listCourse = $this->course->getList()->paginate(Config::get('paginate.course'));
        return view('layouts.user.inc.home', compact('listCourse'));
    }

    public function search(Request $re)
    {
        $listCourse = $this->course->searchCourse($re->search)->paginate(Config::get('paginate.course'));
        return view('layouts.user.inc.home', compact('listCourse'));
    }
}
