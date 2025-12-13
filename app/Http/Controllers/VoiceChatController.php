<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoiceChatController extends Controller
{
    /**
     * Display the voice chat room interface
     * Simple route - no authentication required
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
       return "test" ;
    }

    public function index2(Request $request){
       $isTeacher = \Illuminate\Support\Facades\Auth::guard('teacher')->check();
       $isStudent = \Illuminate\Support\Facades\Auth::guard('student')->check();
       
       \Illuminate\Support\Facades\Log::info('VoiceChat Entry', [
           'is_teacher_guard' => $isTeacher,
           'is_student_guard' => $isStudent,
           'teacher_id' => $isTeacher ? \Illuminate\Support\Facades\Auth::guard('teacher')->id() : null,
           'student_id' => $isStudent ? \Illuminate\Support\Facades\Auth::guard('student')->id() : null,
       ]);

       $rooms = \App\Models\courses::all();
       
       $userName = '';
       if($isTeacher){
           $userName = \Illuminate\Support\Facades\Auth::guard('teacher')->user()->name;
       } else if ($isStudent){
           $userName = \Illuminate\Support\Facades\Auth::guard('student')->user()->name;
       }

       return view('index', compact('isTeacher', 'rooms', 'userName'));
    }

    public function logout(Request $request){
        if(\Illuminate\Support\Facades\Auth::guard('teacher')->check()){
            $id = \Illuminate\Support\Facades\Auth::guard('teacher')->id();
            \App\Models\courses::where('teacher', $id)->delete();
            \Illuminate\Support\Facades\Auth::guard('teacher')->logout();
        }

        if(\Illuminate\Support\Facades\Auth::guard('student')->check()){
            \Illuminate\Support\Facades\Auth::guard('student')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginStudentTeacher');
    }
}

