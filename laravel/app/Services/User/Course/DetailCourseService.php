<?php

namespace App\Services\User\Course;

use App\Services\User\Course\BaseService;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;

class DetailCourseService extends BaseService
{
    private $course;
    private $schedule;
    private $register;

    public function __construct(Course $course, Schedule $schedule, Register $register)
    {
        $this->course = $course;
        $this->schedule = $schedule;
        $this->register = $register;
    }

    public function getInfoCourse($id)
    {
        return $this->course::FindOrFail($id);
    }

    public function getListSchedule($id)
    {
        return $this->schedule::where('course_id', $id)->get();
    }

    public function registed($idCourse)
    {
        //đã đăng ký register
        $listRegister =  $this->register->select('schedules.id as schedule_id')
            ->join('schedules', 'schedules.id', '=', 'registers.schedule_id')
            ->where(['registers.user_id' => Auth::user()->id, 'schedules.course_id' => $idCourse])
            ->get();
        $arrRegis = [];

        if (count($listRegister) > 0) $listRegister = $listRegister->toArray();
        foreach ($listRegister as $item) {
            $arrRegis[] = $item['schedule_id'];
        }

        return $arrRegis;
    }

    public function submitRegister($arrSchedule = [])
    {
        foreach ($arrSchedule as $item) {
            $data[] = [
                'schedule_id' => $item,
                'user_id' => Auth::user()->id,
            ];
        }
        Register::insert($data);
    }
}
