<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Models\Course;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index()
    {
        $objSchedules = Schedule::orderBy('created_at', 'DESC')->get();
        return view('admin.schedule.index', compact('objSchedules'));
    }

    public function add()
    {
        $objCourses = Course::all();
        return view('admin.schedule.add', compact('objCourses'));
    }

    public function postAdd(ScheduleRequest $request)
    {
        $data = array(
            'course_id' => $request->course_id,
            'name' => $request->name,
            'start' => $request->start,
            'calendar' => $request->calendar,
            'created_at' => Carbon::now()
        );
        $result = Schedule::insert($data);
        if ($result == true) {
            return redirect()->route('admin.schedule.index')->with('msg', 'Thêm lịch học thành công');
        }
    }

    public function edit($id)
    {
        $objCourses = Course::all();
        $objSchedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', compact('objSchedule', 'objCourses'));
    }

    public function postEdit($id, ScheduleRequest $request)
    {
        $data = array(
            'course_id' => $request->course_id,
            'name' => $request->name,
            'start' => $request->start,
            'calendar' => $request->calendar,
        );
        Schedule::where('id', $id)->update($data);
        return redirect()->route('admin.schedule.index')->with('msg', 'Cập nhật thông tin lịch học thành công');
    }

    public function del($id)
    {
        $result = Schedule::destroy($id);
        if ($result == true) {
            return redirect()->back()->with('msg', 'Xóa lịch học thành công!');
        }
    }
}
