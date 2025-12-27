<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        if (!Session::get('logged_in')) {
            return redirect()->route('login');
        }

        $user = null;
        $uid = Session::get('user_id');
        if ($uid) {
            $user = User::find($uid);
        }

        if (!$user) {
            $user = (object) [
                'user_id' => Session::get('user_id'),
                'user_username' => Session::get('user_username'),
                'user_fullname' => Session::get('user_fullname'),
                'user_address' => Session::get('user_address'),
                'user_role' => Session::get('user_role'),
            ];
        }

        // We no longer display orders on profile page — only pass user data
        return view('profile', [
            'user' => $user,
        ]);
    }
}
