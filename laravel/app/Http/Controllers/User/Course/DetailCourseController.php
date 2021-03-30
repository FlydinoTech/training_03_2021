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
    protected $course;
    
    public function __construct(DetailCourseService $course)
    {
        $this->course = $course;
    }
    //
    public function detailCourse($id)
    {
        $course = $this->course->getInfoCourse($id);
        return view('user.course.detailCourse', compact('course'));
    }

    public function register($id)
    {
        $course = $this->course->getInfoCourse($id);
        $listSche = $this->course->getListSchedule($id);
        //đã đăng ký register
        $listRegister =  $this->course->getListRegister($id);
        $arrRegis = [];

        if (count($listRegister) > 0) $listRegister = $listRegister->toArray();

        foreach ($listRegister as $item) {
            $arrRegis[] = $item['schedule_id'];
        }

        return view('user.course.formRegister', compact(['listSche', 'arrRegis']));
    }
    public function smRegister(Request $re)
    {
        if ($re->schedule) {
            $this->course->submitRegister($re->schedule);
            return redirect()->route('user.home')->with('successReC', 'Đăng ký thành công');
        } else {
            return redirect()->route('user.home');
        }
    }
}
