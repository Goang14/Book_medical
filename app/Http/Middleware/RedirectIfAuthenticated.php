<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role === UserRole::ADMIN) {
                    return redirect(RouteServiceProvider::ADMIN_HOME);
                } else if (Auth::user()->role === UserRole::USER) {
                    return redirect(RouteServiceProvider::HOME);
                }else if (Auth::user()->role === UserRole::DOCTOR) {
                    return redirect(RouteServiceProvider::DOCTOR);
                }
            }
        }

        return $next($request);
    }
}
