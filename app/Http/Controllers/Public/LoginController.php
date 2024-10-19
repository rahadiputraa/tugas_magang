<?php 

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login page or redirect if the user is already authenticated.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Check if TOKEN_LOGIN cookie exists
        $token = $request->cookie('TOKEN_LOGIN');

        if ($token) {
            // Try to find the user or admin by hashed email in cookie
            $admin = Admin::whereRaw("MD5(email) = ?", [$token])->first();
            $user = User::whereRaw("MD5(email) = ?", [$token])->first();

            if ($admin || $user) {
                // Determine if it's an Admin or User and redirect accordingly
                if ($admin) {
                    return redirect('/admin/dashboard')->with('success', 'Selamat datang ' . $admin->email);
                } else if ($user) {
                    return redirect('/user/dashboard')->with('success', 'Selamat datang ' . $user->email);
                }
            }
        }

        // If not logged in, return the login view
        $data = [
            'title' => 'Login Page',
        ];
        return view('public.login', $data);
    }

    /**
     * Handle login and verify credentials for either Admin or User.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        // Validate the request input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user exists in Admin or User
        $admin = Admin::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        $entity = $admin ? $admin : ($user ? $user : null);

        // If the user is found, verify the password
        if ($entity && Hash::check($request->password, $entity->password)) {
            // Create a token using the hashed email
            $hashedEmail = md5($request->email);

            // Store the token in a cookie for 24 hours
            Cookie::queue('TOKEN_LOGIN', $hashedEmail, 1440);

            // Redirect to the product page
            return redirect('/')->with('success', 'Selamat datang ' . $request->email);
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->with('error', 'Password atau email salah!');
    }
}
