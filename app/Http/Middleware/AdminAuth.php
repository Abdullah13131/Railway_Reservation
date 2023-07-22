<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path() == "/admin/login" && $request->session()->has('admin_id')) {
            return redirect("/admin/index");
        } else if($request->path() == "/admin/index" && !$request->session()->has('admin_id')) {
            return redirect("/admin/login");
        } else if($request->path() == "/signup" && !$request->session()->has('user_id')) {
            return redirect("/");
        } else if($request->path() == "/signup" && $request->session()->has('user_id')) {
            return redirect("/userdashboard");
        }
        return $next($request);
    }
}
