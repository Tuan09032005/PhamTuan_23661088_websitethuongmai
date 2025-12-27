<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    // Ensure the current session belongs to an admin
    private function ensureAdmin()
    {
        if (!Session::get('logged_in') || Session::get('user_role') != 1) {
            return redirect('/admin/login')->with('error', 'Bạn không có quyền truy cập');
        }
        return null;
    }

    public function get_all() {
        if ($resp = $this->ensureAdmin()) return $resp;
        $users = User::all();
        return view('admin/user_list', ['users' => $users]);
    }

    public function insert_form() {
        if ($resp = $this->ensureAdmin()) return $resp;
        return view('admin/user_insert_form');
    }

    public function action_insert(Request $request) {
        if ($resp = $this->ensureAdmin()) return $resp;
        $data = [
            'user_username' => $request->input('username'),
            'user_password' => Hash::make($request->input('password')),
            'user_fullname' => $request->input('fullname'),
            'user_address'  => $request->input('address'),
            'user_role'     => $request->input('user_role') ?? 0,
        ];

        User::create($data);

        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Thêm người dùng thành công!');
    }

    public function show($id) {
        if ($resp = $this->ensureAdmin()) return $resp;
        $users = User::where('user_id', $id)->get();
        return view('admin/user_info_form', ['users' => $users]);
    }

    public function action_update(Request $request) {
        if ($resp = $this->ensureAdmin()) return $resp;
        $id = $request->input('id');

        $data = [
            'user_username' => $request->input('username'),
            'user_fullname' => $request->input('fullname'),
            'user_address'  => $request->input('address'),
        ];

        User::where('user_id', $id)->update($data);
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Cập nhật người dùng thành công!');
    }

    public function del($id) {
        if ($resp = $this->ensureAdmin()) return $resp;
        User::where('user_id', $id)->delete();
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Xóa người dùng thành công!');
    }
}
