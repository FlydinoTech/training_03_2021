<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\User\Course\CourseService;


class IndexController extends Controller
{
    protected $CourseService;
    public function __construct(CourseService $course)
    {
        $this->CourseService = $course;
    }

    public function index()
    {
        $listCourse = $this->CourseService->getList()->paginate(config('paginate.course'));
        return view('layouts.user.inc.home', compact('listCourse'));
    }

    public function search(Request $request)
    {
        $listCourse = $this->CourseService->searchCourse($request->search)->paginate(config('paginate.course'));
        return view('layouts.user.inc.home', compact('listCourse'));
    }
}
