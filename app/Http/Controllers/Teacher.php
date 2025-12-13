<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacchers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Teacher extends Controller
{
     public function checkLogin(Request $request){
            // dd($request->all());
            $remember = $request->has('remember');

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $teacher = teacchers::where('email', $request->email )
                            ->where('status', 'approved')
                            ->first();

            if (!$teacher) {
                return back()->with('error', 'Account not found');
            }

            if (!Hash::check($request->password, $teacher->password)) {
                return back()->with('error', 'Invalid password');
            }

            Auth::guard('student')->logout();
            Auth::guard('teacher')->login($teacher, $remember);

            return redirect()->route('voice.index2')
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

teacchers::create([
    "name" => $req->full_name,
    "email" => $req->email ,
    "phone" => $req->phone ,
    "password" => Hash::make($req->password),
]);

return redirect()->back()->with("success" , "Your Request well placed please wait untill we ..");




}

    public function addCourse(){

    }

    public function createRoom(Request $request){
        \Illuminate\Support\Facades\Log::info('createRoom called', ['request' => $request->all()]);
        
        $request->validate([
            'roomName' => 'required|string',
        ]);

        $teacher = Auth::guard('teacher')->user();
        \Illuminate\Support\Facades\Log::info('createRoom auth check', ['is_teacher' => $teacher ? 'yes' : 'no', 'id' => $teacher ? $teacher->id : null]);

        if(!$teacher) {
            return response()->json(['success' => false, 'message' => 'Unauthorized - Not logged in as teacher'], 401);
        }

        try {
            \App\Models\courses::create([
                'title' => $request->roomName,
                'teacher' => $teacher->id
            ]);
            \Illuminate\Support\Facades\Log::info('Course created successfully');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Course creation failed', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()], 500);
        }

        return response()->json(['success' => true]);
    }

    public function deleteRoom(Request $request){
        $request->validate([
            'roomName' => 'required|string',
        ]);

        $teacher = Auth::guard('teacher')->user();

        if(!$teacher) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        \App\Models\courses::where('title', $request->roomName)
            ->delete();

        return response()->json(['success' => true]);
    }
}
