<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // Get the token from the cookie
        $token = $request->cookie('TOKEN_LOGIN');
        
        // Determine if the token belongs to an Admin or User
        $admin = User::whereRaw("MD5(email) = ?", [$token])->first();
        $user = User::whereRaw("MD5(email) = ?", [$token])->first();

        // Prepare the data for the view
        $data = [
            'title' => 'Profile',
            'item' => $admin ? $admin : $user, // Use admin data if available, otherwise user data
            'is_admin' => $admin ? true : false // Flag to differentiate between Admin and User
        ];

        // Return the profile view with the data
        return view('user.profile', $data);
    }
    public function update_save(Request $request)
    {

    // Get the token from the cookie
    $token = $request->cookie('TOKEN_LOGIN');
        
    // Determine if the token belongs to an Admin or User
    // $admin = User::whereRaw("MD5(email) = ?", [$token])->first();
    
        /*
     | Validation
     */
     $validator = Validator::make(
        $request->all(),
        [
            'email' => 'required',
            'password' => [
               'required',
               'confirmed',
               'string',
               'min:8',
               'regex:/[a-z]/',
               'regex:/[A-Z]/',
               'regex:/[0-9]/',
               'regex:/[@$!%*?&]/',
           ],
        ],
        [
            'required' => ' harus disii',
            'password.required' => 'A password is required.',
           'password.confirmed' => 'The password confirmation does not match.',
           'password.min' => 'The password must be at least :min characters.',
           'password.regex' => 'The password must include at least one uppercase letter, one lowercase letter, one numeric digit, and one special character.',
        ]
    );

    /*
    | Validation failed
    |
    | Return back with input and error message
    */
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    /*
    | Validation success
    |
    | Update or Create $request
    */
    User::where('email', $token)->update([
        'email' => $request->email,
    ]);

    /*
    | Validation new passowrd
    |
    | Update $request
    */
    if($request->password != null || $request->password_confirmation != null) {
        if($request->password == $request->password_confirmation) {
            User::where('email', $token)->update([
                'password' => Hash::make($request->password)
            ]);
        } else {
            Alert::info('Not Match!', 'diferent password!');
            return redirect()->back()->withInput();
        }
    }

    /*
    | Return back
    |
    | return view student verify
    | Cookie::queue('login_token', $email, 100 * 60 * 60 * 24 * 7);
    */
    Alert::success('Success!', 'update profile!');
    return redirect()->back();
    }
}
