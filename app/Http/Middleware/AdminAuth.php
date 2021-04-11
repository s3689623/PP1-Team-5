<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = session('user');
        if (! $user || $user['role'] != 'admin') {
            $request->session()->flush();
            $previousURL = request()->path();
            if ($previousURL == "admin/logout") {
                $previousURL = '';
            } else {
                $previousURL = '?redirect='.$previousURL;
            }

            return redirect('/admin/login'.$previousURL);
        }

        return $next($request);
    }
}
