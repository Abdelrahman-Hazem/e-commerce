<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
class CustomAuthController extends Controller
{

    public function site()
    {
        return view('frontend.pages.index');
    }
    public function admin()
    {
        return view('dashboard.pages.index');
    }
    public function adminLogin()
    {
        return view('auth.admin_login');
    }
    public function checkAdminLogin(Request $request)
    {
        $this->validate($request,[
          'email' =>'required|email' ,
          'password' => 'required|min:4'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email , 'password'=>$request->password]))
        {
           return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
    
}
