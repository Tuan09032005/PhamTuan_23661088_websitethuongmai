<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('logged_in') || Session::get('user_role') != 1) {
            return redirect('/admin/login')->with('error', 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
