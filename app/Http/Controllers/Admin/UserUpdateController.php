<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserUpdateController extends Controller
{
 
 public function index(Request $request, $id) {
  // Get the token from the cookie
  $item = User::where("id", $id)->first();

  return view('admin.userupdate', compact('item'));
 }

 public function save(Request $request)
 {
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
     User::where('id', $request->id)->update([
         'email' => $request->email,
     ]);

     /*
     | Validation new passowrd
     |
     | Update $request
     */
     if($request->password != null || $request->password_confirmation != null) {
         if($request->password == $request->password_confirmation) {
             User::where('id', $request->id)->update([
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