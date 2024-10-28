<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    // Show user login form
    public function showUserLoginForm()
    {
        return view('user.login');
    }

    // Handle user login
    public function handleUserLogin(Request $request)
    {
        $request->validate([
            'courriel' => 'required|email',
            'mot_de_passe' => 'required|string|min:8',
        ]);

        // Attempt to log in the user using the default guard
        if (Auth::guard('web')->attempt(['courriel' => $request->courriel, 'password' => $request->mot_de_passe])) {
            // Redirect to user index after successful login
            return redirect()->route('user.index')->with('success', 'Connexion utilisateur réussie!');
        }

        // Redirect back if login fails
        return back()->withErrors(['courriel' => 'Identifiants incorrects.'])->withInput();
    }
}

