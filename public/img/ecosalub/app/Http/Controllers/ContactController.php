<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // This method returns the contact view
    public function showContact()
    {
        return view('contact');
    }

    // This method handles the form submission
    public function submit(Request $request)
{
    // Validate the form inputs
    $request->validate([
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'courriel' => 'required|email|max:255',
        'entreprise' => 'nullable|string|max:255',
        'zip' => 'nullable|string|max:10',
        'telephone' => 'nullable|string|max:15',
        'sujet' => 'required|string|max:255',
        'message' => 'required|string|max:500',
        'newsletter' => 'nullable|boolean', 
    ]);

    // Send the email using the Mailable class
    Mail::send(new ContactFormSubmitted($request)); 
    return back()->with('success', 'Votre message a été envoyé avec succès.');
}

}
