<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function postAdd(Request $request)
    {
        $data = $request->all();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    public function del($id)
    {
        return "Xoa khoa hoc ". $id;
    }
}
