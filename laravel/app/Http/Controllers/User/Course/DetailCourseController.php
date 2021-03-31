<?php

namespace App\Http\Controllers\User\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Course;
// use App\Models\Schedule;
// use App\Models\Register;
use App\Services\User\Course\DetailCourseService;


class DetailCourseController extends Controller
{
    protected $detailCourseService;
    
    public function __construct(DetailCourseService $detailCourseService)
    {
        $this->detailCourseService = $detailCourseService;
    }
    //
    public function detailCourse($id)
    {
        $course = $this->detailCourseService->getInfoCourse($id);
        return view('user.course.detailCourse', compact('course'));
    }

    public function register($id)
    {
        $listSche = $this->detailCourseService->getListSchedule($id);
        //đã đăng ký register
        $arrRegis =  $this->detailCourseService->registed($id);  

        return view('user.course.formRegister', compact(['listSche', 'arrRegis']));
    }
    public function smRegister(Request $request)
    {
        if ($request->schedule) {
            $this->detailCourseService->submitRegister($request->schedule);
            return redirect()->route('user.home')->with('successReC', 'Đăng ký thành công');
        } else {
            return redirect()->route('user.home');
        }
    }
}
