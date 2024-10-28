<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
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

        if (Auth::attempt(['courriel' => $request->courriel, 'password' => $request->mot_de_passe])) {
            return redirect()->route('user.index')->with('success', 'Connexion utilisateur réussie!');
        }

        return back()->withErrors(['courriel' => 'Identifiants incorrects.'])->withInput();
    }
}

