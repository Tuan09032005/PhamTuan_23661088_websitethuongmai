<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function index()
    {
        $message = Session::get('message');
        return view('admin.login', compact('message'));
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        $user = User::where('user_username', $request->username)
                    ->where('user_password', $request->password)
                    ->first();

        if ($user) {
            // Lưu thông tin vào session
            Session::put('user_id', $user->user_id);
            Session::put('user_fullname', $user->user_fullname);
            Session::put('logged_in', true);

            // Dùng push để lưu roles
            Session::push('roles', $user->user_role ?? 'user');

            return redirect('/admin/danh-sach-nguoi-dung')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
    }

    // Đăng xuất
    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_fullname');
        Session::forget('logged_in');
        Session::forget('roles');

        return redirect('/admin/login')->with('success', 'Đăng xuất thành công!');
    }
}
