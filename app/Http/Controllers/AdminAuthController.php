<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;
use App\Models\Job;
class AdminAuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }

    public function login (Request $request){
        $credentials = $request ->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors(['email'=>'indentifiant incorrects.']);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
       


}
