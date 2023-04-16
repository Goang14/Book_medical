<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthorUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && (Auth::user()->role == UserRole::USER || Auth::user()->role == UserRole::ADMIN  || Auth::user()->role == UserRole::DOCTOR)) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
