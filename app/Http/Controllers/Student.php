<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class Student extends Controller
{

    public function loadLoginPage(){


        return view("LoginStudent");
    }


    public function loadRequestPage(){
                return view("RequestAccess");

    }

  public function checkLogin(Request $request)
{
    // dd($request->all());
    $remember = $request->has('remember');

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $student = students::where('email', $request->email )
                      ->where('status', 'approved')
                      ->first();

    if (!$student) {
        return back()->with('error', 'Account not found');
    }

    if (!Hash::check($request->password, $student->password)) {
        return back()->with('error', 'Invalid password');
    }

    Auth::guard('teacher')->logout();
    Auth::guard('student')->login($student, $remember);

    return redirect()->route('student.dashboard')
                     ->with('success', 'You can check your courses now');
}


    public function placeRequest(Request $req){
            // dd($req->all());
        $validated = $valid = $req->validate([
            "full_name" => "required|min:3|max:30",
            "email" => "required|email",
            "phone" => "required|min:10 | max:14",
            "password" => "required"
        ]); 
        
        // dd($validated);

        students::create([
            "name" => $req->full_name,
            "email" => $req->email ,
            "phone" => $req->phone ,
            "password" => Hash::make($req->password),
        ]);

        return redirect()->back()->with("success" , "Your Request well placed please wait untill we ..");

    }

    public function addCourse(){

    }
    public function dashboard(){
        $courses = \App\Models\courses::all(); 
        $userName = Auth::guard('student')->user()->name;

        return view('StudentDashboard', compact('courses', 'userName'));
    }
}
