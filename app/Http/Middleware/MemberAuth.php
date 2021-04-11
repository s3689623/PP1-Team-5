<?php

namespace App\Http\Middleware;

use Closure;

class MemberAuth
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
        if (! $user || $user['role'] != 'member') {
            $request->session()->flush();

            $previousURL = request()->path();
            if ($previousURL == "member/logout") {
                $previousURL = '';
            } else {
                $previousURL = '?redirect='.$previousURL;
            }

            return redirect('/member/login'.$previousURL);
        }

        return $next($request);
    }
}
