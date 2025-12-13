<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMeController;
use App\Http\Middleware\Has_licence as LicenceMiddleware;
use App\Http\Controllers\has_licence as LicenceController;
use App\Http\Controllers\VoiceChatController;
use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Hash;
use App\Models\admins;


Route::middleware(['has_licence'])->group(function(){

    Route::get('/', function () {
        return view('home');
    })->name("home");

    Route::get('/CourAllemand', function () {
        return view('CourAllemand');
    })->name("CourAllemand");

    Route::get('/emploiEnAllemagne', function () {
        return view('emploiEnAllemagne');
    })->name("emploiEnAllemagne");

    Route::get('/FormationEnSoins', function () {
        return view('FormationEnSoins');
    })->name("FormationEnSoins");

    Route::post("/submitMessage",[ContactMeController::class  , "submitMessage"])->name("submitMessage");

});

// Login Route for Admin
Route::get('/Admin/Login',[AuthenticationController::class, 'LoadLoginPage'])->name('Admin.LoginPage');
Route::post('/Admin/Login',[AuthenticationController::class, 'checkLogin'])->name('Admin.Login');
Route::get('/register',[Student::class, 'loadRequestPage'])->name('Register.request');
Route::post('/register',[Student::class, 'placeRequest'])->name('Register.post');

// login page for student/Teacher
Route::get('/LoginStudentTeacher',[Student::class, 'loadLoginPage'])->name('loginStudentTeacher');

Route::post('/LoginStudent',[Student::class, 'checkLogin'])->name('student.Login');

Route::post('/approaveStudent/{id}',[Teacher::class, 'placeRequest'])->name('registerTeacher.post');
Route::post('/approaveStudent/{id}',[AdminController::class, 'approaveStudent'])->name('approaveStudent');
Route::post('/rejectStudent/{id}',[AdminController::class, 'rejectStudent'])->name('rejectStudent');


Route::post('/LoginTeacher',[Teacher::class, 'checkLogin'])->name('teacher.Login');
Route::post('/teacher/create-room', [Teacher::class, 'createRoom'])->name('teacher.createRoom');
Route::post('/teacher/delete-room', [Teacher::class, 'deleteRoom'])->name('teacher.deleteRoom');

Route::post('/registerTeacher',[Teacher::class, 'placeRequest'])->name('registerTeacher.post');
Route::post('/approaveTeacher/{id}',[AdminController::class, 'approaveTeacher'])->name('approaveTeacher');
Route::post('/rejectTeacher/{id}',[AdminController::class, 'rejectTeacher'])->name('rejectTeacher');

// create admin 
Route::get('/Admin/Create', function(){
   
    $admin = new admins();
    $admin->name = "mohamed";
    $admin->email = "mohamed@gmail.com";
    $admin->password = Hash::make("aze"); ;
    $admin->save();
});


Route::middleware(['auth:admin'])->group(function(){
    Route::get('/Admin/Dashboard',[AuthenticationController::class, 'LoadDashboard'])->name('Admin.Dashboard');
});



// lock route from url 

Route::get('/changeStatus/{val}',[LicenceController::class, 'changeStatus'])->name('check_licence');

// Voice Chat Route - No authentication required
Route::middleware(['approved'])->group(function(){
    Route::post('/logout', [VoiceChatController::class, 'logout'])->name('logout');
    Route::get('/voice-chat', [VoiceChatController::class, 'index'])->name('voice-chat.index');
    Route::get('/voice', [VoiceChatController::class, 'index2'])->name('voice.index2');
});
    