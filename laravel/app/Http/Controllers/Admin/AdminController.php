<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        $objAdmins = Admin::all();
        return view('admin.admin.index', compact('objAdmins'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function postAdd(AdminRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        );
        $result = Admin::insert($data);
        if ($result == true) {
            return redirect()->route('admin.admin.index')->with('msg', 'Thêm người dùng thành công');
        }
    }

    public function edit($id)
    {
        $objAdmin = Admin::findOrFail($id);
        if ($objAdmin->email == 'admin@gmail.com') {
            return redirect()->back()->with('error', 'Tài khoản này không được phép thay đổi!');
        }

        $objAdmin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('objAdmin'));
    }

    public function postEdit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Nhập họ tên',
            'role.required' => 'Chọn vai trò'
        ]);

        $data = array(
            'name' => $request->name,
            'role' => $request->role
        );
        Admin::where('id', $id)->update($data);
        return redirect()->route('admin.admin.index')->with('msg', 'Cập nhật thông tin người dùng thành công');
    }

    public function del($id)
    {
        $objAdmin = Admin::findOrFail($id);
        if ($objAdmin->email == 'admin@gmail.com') {
            return redirect()->back()->with('error', 'Không được xóa tài khoản này!');
        }

        $result = Admin::destroy($id);
        if ($result == true) {
            return redirect()->route('admin.admin.index')->with('msg', 'Xóa người dùng thành công!');
        }
    }
}
