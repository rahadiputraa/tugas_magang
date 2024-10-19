<?php
 
 namespace App\Http\Controllers\Public;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class LogOutController extends Controller
{
    public function logout()
    {
        //hapus cookie
        Cookie::queue(Cookie::forget('TOKEN_LOGIN'));

        return redirect("/")->with('success', 'berhasil logout!');
    }

}