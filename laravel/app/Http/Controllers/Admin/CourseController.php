<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $objCourses = Course::all();
        return view('admin.course.index', compact('objCourses'));
    }

    public function add()
    {
        return view('admin.course.add');
    }

    public function postAdd(CourseRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'tuition' => $request->tuition,
            'time' => $request->time,
            'desc' => $request->desc,
            'detail' => $request->detail
        );
        $result = Course::insert($data);
        if ($result == true) {
            return redirect()->route('admin.course.index')->with('msg', 'Thêm khóa học thành công');
        }
    }

    public function edit($id)
    {
        $objCourse = Course::findOrFail($id);
        return view('admin.course.edit', compact('objCourse'));
    }

    public function postEdit($id, CourseRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'tuition' => $request->tuition,
            'time' => $request->time,
            'desc' => $request->desc,
            'detail' => $request->detail
        );
        Course::where('id', $id)->update($data);
        return redirect()->route('admin.course.index')->with('msg', 'Cập nhật thông tin khóa học thành công');
    }

    public function del($id)
    {
        $result = Course::destroy($id);
        if ($result == true) {
            return redirect()->route('admin.course.index')->with('msg', 'Xóa khóa học thành công!');
        }
    }
}
