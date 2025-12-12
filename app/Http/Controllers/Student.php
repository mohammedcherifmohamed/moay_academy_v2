<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Hash;

class Student extends Controller
{

    public function loadRequestPage(){
                return view("RequestAccess");

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
}
