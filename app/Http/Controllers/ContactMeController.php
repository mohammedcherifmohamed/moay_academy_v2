<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use Illuminate\Support\Facades\Log; 



class ContactMeController extends Controller
{
    public function submitMessage(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'language_level' => 'nullable|string|max:4',
            'formation' => 'required',
            'phone_number' => 'required|string|min:10|max:18',
            'email' => 'required|email|max:100',
            'message' => 'nullable|string|max:1000',
        ]);

     $data = [
            'full_name' => $request->nom . " " . $request->prenom ,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'language_level' => $request->language_level,
            'formation' => $request->formation,
            'phone_number' => $request->phone_number,
            'usermessage' => $request->message ,
        ];
        // dd($data);
        try {
            Mail::to('mdg85505@gmail.com')->send(new ContactMe($data));
            return view("Mail.Success");
        } catch (\Exception $e) {
                Log::error('Mail sending failed: '.$e->getMessage());
             return redirect()->back()->withErrors(['mail' => 'Échec de l’envoi du mail.']);
        }


    }


}