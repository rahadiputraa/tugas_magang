<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the token from the cookie
        $token = $request->cookie('TOKEN_LOGIN');

        // Check if the token exists and matches any user
        if ($token) {
            // Find user where the MD5 hash of their email matches the token
            $user = User::whereRaw("MD5(email) = ?", [$token])->first();

            // If user exists, allow the request to proceed
            if ($user) {
                return $next($request);
            }
        }

        // If authentication fails, redirect to login page
        return redirect('/');
    }
}
