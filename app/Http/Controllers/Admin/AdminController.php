<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students;
use App\Models\teacchers;

class AdminController extends Controller
{
    public function approaveStudent($id){
         $student = students::findOrFail($id);
        $student->status = 'approved';
        $student->save();

         return redirect()->back()->with('success', "Student {$student->name} has been approved.");
    }
    public function rejectStudent($id){
         $student = students::findOrFail($id);

        $studentName = $student->name;
         $student->delete();

        return redirect()->back()->with('success', "Student {$studentName} has been rejected.");

    }
    public function approaveTeacher($id){
         $teacher = teacchers::findOrFail($id);
        $teacher->status = 'approved';
        $teacher->save();

         return redirect()->back()->with('success', "teacher {$teacher->name} has been approved.");
    }
    public function rejectTeacher($id){
         $teacher = teacchers::findOrFail($id);

        $teachertName = $teacher->name;
         $teacher->delete();

        return redirect()->back()->with('success', "teacher {$teachertName} has been rejected.");

    }
}
