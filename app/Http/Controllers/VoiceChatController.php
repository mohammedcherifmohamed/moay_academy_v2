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
       return view('index');
    }
}

