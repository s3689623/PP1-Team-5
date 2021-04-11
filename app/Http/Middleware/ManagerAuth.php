<?php

namespace App\Http\Middleware;

use Closure;

class ManagerAuth
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
        if (! $user || $user['role'] != 'manager') {
            $request->session()->flush();
            $previousURL = request()->path();
            if ($previousURL == "manager/logout") {
                $previousURL = '';
            } else {
                $previousURL = '?redirect='.$previousURL;
            }

            return redirect('/manager/login'.$previousURL);
        }

        return $next($request);
    }
}
