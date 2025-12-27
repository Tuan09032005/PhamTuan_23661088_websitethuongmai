<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
        $user = User::where('user_username', $request->username)->first();

        if ($user && $request->password == $user->user_password) {
            // Lưu thông tin vào session
            Session::put('user_id', $user->user_id);
            Session::put('user_fullname', $user->user_fullname);
            Session::put('logged_in', true);

            // Lưu vai trò người dùng để kiểm tra quyền
            $role = $user->user_role ?? 0;
            Session::put('user_role', $role);
            Session::put('roles', $role);

            if ($role == 1) {
                return redirect('/admin/danh-sach-nguoi-dung')->with('success', 'Đăng nhập thành công!');
            }

            return redirect('/')->with('success', 'Đăng nhập thành công!');
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
        Session::forget('user_role');

        return redirect('/admin/login')->with('success', 'Đăng xuất thành công!');
    }

    // Hiển thị form đăng ký (public)
    public function showRegister()
    {
        return view('register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'user_username' => 'required|unique:user,user_username',
            'user_password' => 'required|min:4',
            'user_fullname' => 'required'
        ], [
            'user_username.required' => 'Vui lòng nhập tên đăng nhập',
            'user_username.unique' => 'Tên đăng nhập đã tồn tại',
            'user_password.required' => 'Vui lòng nhập mật khẩu',
            'user_fullname.required' => 'Vui lòng nhập họ và tên',
        ]);

        $data = [
            'user_username' => $request->input('user_username'),
            'user_password' => $request->input('user_password'),
            'user_fullname' => $request->input('user_fullname'),
            'user_address'  => $request->input('user_address'),
            'user_role'     => 0,
        ];

        User::create($data);

        return redirect('/admin/login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
