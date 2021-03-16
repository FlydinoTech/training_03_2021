<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.course.index');
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

    public function del($id)
    {
        return "Xoa khoa hoc " . $id;
    }
}
