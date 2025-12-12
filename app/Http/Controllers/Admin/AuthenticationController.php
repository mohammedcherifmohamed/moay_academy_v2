<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\admins;

class AuthenticationController extends Controller
{

    public function checkLogin(Request $request){
        // add remember me option
        $remember = $request->remember ? true : false;

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = admins::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'Admin not found');
        }
        if(!Hash::check($request->password, $admin->password)){
            return redirect()->back()->with('error', 'Invalid password');
        }

        Auth::guard('admin')->login($admin, $remember);
        return redirect()->route('Admin.Dashboard');
    }

    public function LoadDashboard(){
        return view('Admin.Dashboard');
    }


    public function LoadLoginPage(){
        return view('Admin.LoginPage');
    }

    public function logout(){
        Auth::logout();
        return redirect()->back()->with('success', 'Logout successful!');
    }

    public function LoadForgotPassword(){
        //return view('Admin.Auth.Forgot');
    }

}
