<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class CheckLoginAdmin
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

        // Check if the token exists and matches any Admin
        if ($token) {
            // Find admin where the MD5 hash of their email matches the token
            $admin = Admin::whereRaw("MD5(email) = ?", [$token])->first();

            // If admin exists, allow the request to proceed
            if ($admin) {
                return $next($request);
            }
        }

        // If authentication fails, redirect to login page
        return redirect('/');
    }
}
