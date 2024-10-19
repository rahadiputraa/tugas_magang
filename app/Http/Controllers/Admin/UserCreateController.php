<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserCreateController extends Controller
{
 public function index() {
  return view('admin.usercreate');
 }

 public function save(Request $request)
 {
     /*
     | Validation
     */
     $validator = Validator::make(
         $request->all(),
         [
             'email' => 'required|unique:App\Models\User,email',
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
             'unique' => ' sudah terdaftar',
             'confirmed' => ' tidak sama', 
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
         Alert::info('Tidak Valid', 'tidak tervalidasi!');
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
     User::updateOrCreate([
         'email' => $request->email,
         'password' => Hash::make($request->password),
     ]);

     /*
     | Return back
     |
     | return view student verify
     | Cookie::queue('login_token', $email, 100 * 60 * 60 * 24 * 7);
     */
     Alert::success('Success!', 'new User!');
     return redirect()->back();
 }
}